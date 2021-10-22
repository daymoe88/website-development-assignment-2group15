<?php

//include_once "db-functions.php";

if (isset($_POST['productID']))
{
    // open a new connection to the db
    require_once "dbconn.php";

    // create a query to update the quantity of the product in the user's cart
    $query = "UPDATE CartProduct SET quantity=? WHERE productID=?;";

    // prepare statement to sanitise user input
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 'ss', htmlspecialchars($_POST['quantity']), htmlspecialchars($_POST['productID']));

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // if successful, redirect back to the cart
        header("location: shopping-cart.php");
    }
    else
    {
        echo "Error: Unable to update the quantity of this item";
        error_log(mysqli_error($conn));
        //echo mysqli_error($conn);
    }

    // close the prepared statement
    mysqli_stmt_close($statement);

    // close connection to the db
    mysqli_close($conn);
}

?>