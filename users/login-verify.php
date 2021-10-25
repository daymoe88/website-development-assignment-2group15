<?php

session_start();

// initialise error message variables in session
$_SESSION['errFieldsEmpty'] = "";
$_SESSION['errFieldsIncorrect'] = "";

if (!empty($_POST['email']) && !empty($_POST['password']))
{
    // open a new connection to the db
    require_once "../dbconn.php";

    // sanitise against HTML input
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // create a query to check that the input details are valid
    $query = "SELECT userID, email, password FROM UserAccount WHERE email=?;";

    // prepare statement to sanitise user input
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 's', $email);

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // fetch the results of the sql query
        $result = mysqli_stmt_get_result($statement);

        // if a user account exists for the provided email address
        if (mysqli_num_rows($result) == 1)
        {
            // fetch the details
            $userDetails = mysqli_fetch_assoc($result);

            // verify the input details against the stored data
            if (password_verify($password, $userDetails['password']))
            {
                // log the user in
                $_SESSION['logged-in'] = true;
                $_SESSION['userID'] = $userDetails['userID'];
        
                // redirect back to the home page
                header("location: ../home.php");
            }
            else
            {
                // the entered password did not match
                $_SESSION['errFieldsIncorrect'] = "The email or password you have entered is incorrect.";
                header("location: login.php");

            }
        }
        else
        {
            // there is no account associated with these details. Click here to create an account.
            // the entered email did not match
            $_SESSION['errFieldsIncorrect'] = "The email or password you have entered is incorrect.";
            header("location: login.php");

        }

        // close the prepared statement
        mysqli_stmt_close($statement);

        // close connection to the db
        mysqli_close($conn);

        
    }
    else
    {
        echo "Error: Unable to access database.<br>";
        error_log(mysqli_error($conn));
    }

}
else
{
    // user has not filled out all fields
    $_SESSION['errFieldsEmpty'] = "Please ensure you fill in all the required fields.";
    header("location: login.php");
}

?>