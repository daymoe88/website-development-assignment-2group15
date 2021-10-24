<?php

define("DB_HOST", "localhost");
define("DB_NAME", "Assignment02");
define("DB_USER", "dbadmin");
define("DB_PASS", "");

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn)
{
    // Something went wrong...
    echo "Error: Unable to connect to database.<br>";

    // echo "Debugging errno: " . mysqli_connect_errno() . "<br>"; // debugging messages -- COMMENT OUT FOR DEPLOYMENT
    // echo "Debugging error: " . mysqli_connect_error() . "<br>"; // debugging messages -- COMMENT OUT FOR DEPLOYMENT

    error_log(mysqli_connect_error()); // log the error
    exit;
}
else
{
    mysqli_set_charset($conn, "utf8mb4");
}

?>