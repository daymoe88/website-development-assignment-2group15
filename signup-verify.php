<?php

session_start();

// initialise error message variables in session
$_SESSION['errPassword'] = "";
$_SESSION['errEmail'] = "";
$_SESSION['errFieldsEmpty'] = "";

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword']))
{
    // open a new connection to the db
    require_once "../dbconn.php";

    // sanitise against HTML input
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    $email = htmlspecialchars($_POST['email']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);

    // first, check that the password matches the confirm password
    // we do this on the server side so that the inputs can be sanitised thoroughly
    if ($password != $confirmPassword)
    {
        // if not a match, send them back to the sign up page with an error message
        $_SESSION['errPassword'] = "The passwords you have entered do not match.";
        header("location: signup.php");

        // close connection to the db
        mysqli_close($conn);
        exit;
    }

    // then, check that the given email address is not already in the database
    $query = "SELECT email FROM UserAccount WHERE email=?;";

    // prepare statement
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 's', $email);

    // execute the statement
    if (mysqli_stmt_execute($statement))
    {
        // fetch the results of the sql query
        $result = mysqli_stmt_get_result($statement);

        // if a user account already exists for the provided email address, send the user back with an error message
        if (mysqli_num_rows($result) == 1)
        {
            $_SESSION['errEmail'] = "The email address you have entered is already associated with an account.";
            header("location: signup.php");

            // close the prepared statement
            mysqli_stmt_close($statement);

            // close connection to the db
            mysqli_close($conn);

            exit;
        }
    }

    // now we can create a query to create an entry in the database for the user
    $query = "INSERT INTO UserAccount (firstName, lastName, email, password) VALUES (?, ?, ?, ?);";

    // encrypt provided password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // prepare statement to sanitise user input
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 'ssss', ucfirst($firstName), ucfirst($lastName), $email, $password);

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // if new item successfully added, update the session information
        $userID = mysqli_insert_id($conn);
        
        $_SESSION['logged-in'] = true;
        $_SESSION['userID'] = $userID;
        
        // redirect back to the home page
        header("location: ../home.php");
    }
    else
    {
        echo "Error: Unable to register the user details. Please ensure you have filled out all the fields on the previous page correctly.<br>";
        error_log(mysqli_error($conn));
        //echo mysqli_error($conn);
    }

    // close the prepared statement
    mysqli_stmt_close($statement);

    // close connection to the db
    mysqli_close($conn);

}
else
{
    // user has not filled out all fields
    $_SESSION['errFieldsEmpty'] = "Please ensure you fill in all the required fields.";
    header("location: signup.php");
}

?>