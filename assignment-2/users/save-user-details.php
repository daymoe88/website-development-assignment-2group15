<?php

session_start();

// initialise error message variables in session
$_SESSION['errPassword'] = "";
$_SESSION['errEmail'] = "";
$_SESSION['errFieldsEmpty'] = "";
$_SESSION['errPostcode'] = "";

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']))
{
    // open a new connection to the db
    require_once "../dbconn.php";

    // sanitise against HTML input
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['passwordConfirm']);
    $email = htmlspecialchars($_POST['email']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $address = htmlspecialchars($_POST['address']);
    $postcode = htmlspecialchars($_POST['postcode']);

    // first, check that the password matches the confirm password
    // we do this on the server side so that the inputs can be sanitised thoroughly
    if ((!empty($password) || !empty($confirmPassword)) && ($password != $confirmPassword))
    {
        // if not a match, send them back to the sign up page with an error message
        $_SESSION['errPassword'] = "The passwords you have entered do not match.";
        header("location: modify-user-details.php");

        // close connection to the db
        mysqli_close($conn);
        exit;
    }

    // then, check that the given postcode is 4 digits long
    if (strlen($postcode) != 4)
    {
        $_SESSION['errPostcode'] = "Please ensure your postcode is four digits long.";

        header("location: modify-user-details.php");

        // close connection to the db
        mysqli_close($conn);
        exit;
    }

    // then, check that the given email address is not already in the database for a different user
    $query = "SELECT userID, email FROM UserAccount WHERE email=? AND NOT userID=".$_SESSION['userID'].";";

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
            header("location: modify-user-details.php");

            // free the result set
            mysqli_free_result($result);

            // close the prepared statement
            mysqli_stmt_close($statement);

            // close connection to the db
            mysqli_close($conn);

            exit;
        }

        // free the result set
        mysqli_free_result($result);
    }

    // if the password fields were left empty, then don't update the password in the database
    if (empty($password) && empty($confirmPassword))
    {
        $query = "UPDATE UserAccount SET firstName=?, lastName=?, email=?, streetAddress=?, postcode=? WHERE userID=".$_SESSION['userID'].";";

        // prepare statement to sanitise user input
        mysqli_stmt_prepare($statement, $query);
        mysqli_stmt_bind_param($statement, 'sssss', ucfirst($firstName), ucfirst($lastName), $email, ucwords($address), $postcode);
    }
    else
    {
        // else, create a query to update the password as well
        $query = "UPDATE UserAccount SET firstName=?, lastName=?, email=?, password=?, streetAddress=?, postcode=? WHERE userID=".$_SESSION['userID'].";";

        // encrypt provided password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // prepare statement to sanitise user input
        mysqli_stmt_prepare($statement, $query);
        mysqli_stmt_bind_param($statement, 'ssssss', ucfirst($firstName), ucfirst($lastName), $email, $password, ucwords($address), $postcode);
    }

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // if new item successfully updated, redirect back to user account (send confirmation message?)
        header("location: user-account.php");
    }
    else
    {
        echo "Error: Unable to update user details. Please ensure you have filled out all the fields on the previous page correctly.<br>";
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
    header("location: modify-user-details.php");
}

?>