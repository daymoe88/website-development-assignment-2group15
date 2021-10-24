<?php

session_start();

// only delete the account if the user is logged into it
if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'])
{
    // open a new connection to the db
    require_once "../dbconn.php";

    // create a query to delete the user's account from the database
    $query = "DELETE FROM UserAccount WHERE userID=".$_SESSION['userID'].";";

    if (mysqli_query($conn, $query))
    {
        // if successfully deleted, log the user out (ie destroy the session)
        header("location: logout.php");
        exit;
    }
    else
    {
        echo "Error: Unable to delete the user's account.<br>";
        error_log(mysqli_error($conn));
    }

    // close connection to the db
    mysqli_close($conn);
}

?>