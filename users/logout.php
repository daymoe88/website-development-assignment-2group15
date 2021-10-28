<?php

session_start();

// only log user out if already logged in
if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'])
{
    // reset the relevant session details
    $_SESSION['logged-in'] = false;
    $_SESSION['userID'] = null;

    // destroy the session.
    session_destroy();

    // redirect back to the home page
    header("location: ../home.php");
}

?>