<?php

//include_once "db-functions.php";

if (isset($_POST['productID']))
{
    // open a new connection to the db
    require_once "dbconn.php";

    // create a query to delete the product from the CartProduct table
    $query = "DELETE FROM CartProduct WHERE productID=?;";

    // prepare statement to sanitise the product id attribute
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST['productID']));

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // if successful, redirect back to the cart
        header("location: shopping-cart.php");
    }
    else
    {
        echo "Error: Unable to remove item from cart.<br>";
        error_log(mysqli_error($conn));
        //echo mysqli_error($conn);
    }

    // close the prepared statement
    mysqli_stmt_close($statement);

    // close connection to the db
    mysqli_close($conn);
}

?>