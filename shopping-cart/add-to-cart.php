<?php

session_start();

include_once "../db-functions.php";

if (isset($_POST['quantity']) && isset($_POST['productID']))
{
    // open a new connection to the db
    require_once "../dbconn.php";

    // create a query to add the product to the cart
    $query = "INSERT INTO CartProduct VALUES (".$_SESSION['userID'].", ?, ?);";

    $productID = htmlspecialchars($_POST['productID']);
    $quantity = htmlspecialchars($_POST['quantity']);

    // prepare statement to sanitise user input
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 'ss', $productID, $quantity);

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // if new item successfully added, redirect back to the product-information page
        $selectQuery = "SELECT * FROM CartProduct WHERE userID=".$_SESSION['userID']." AND productID=?;";

        mysqli_stmt_prepare($statement, $selectQuery);
        mysqli_stmt_bind_param($statement, 's', $productID);

        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);
        $cartItem = mysqli_fetch_assoc($result);

        // update the stock levels in the database -- NOT YET!! only update stock levels on purchases!!!
        //update_stock($conn, $cartItem['productID'], $cartItem['quantity']);

        // return to the page stipulated in the URL param
        //header('location: ../product-information.php?productID='.$cartItem['productID']);
        //header('location: ../'.htmlspecialchars($_GET['return']));

        // return to the page stipulated in the URL param, ensuring that the user has not attempted to redirect to their own malicious page
        switch (htmlspecialchars($_GET['return']))
        {
            case "product-information.php?productID=".$productID:
            case "checkout.php":
                header('location: ../'.htmlspecialchars($_GET['return']));
        }

        // free the generated set
        mysqli_free_result($result);
    }
    else
    {
        echo "Error: Unable to add item to cart.<br>";
        error_log(mysqli_error($conn));
         echo mysqli_error($conn);
    }

    // close the prepared statement
    mysqli_stmt_close($statement);

    // close connection to the db
    mysqli_close($conn);

}

?>