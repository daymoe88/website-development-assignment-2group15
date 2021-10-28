<?php

session_start();

include_once "db-functions.php";

// initialise error message variables in session
$_SESSION['errFieldsEmpty'] = "";
$_SESSION['errPostcode'] = "";
$_SESSION['errNumberInput'] = "";

if (!empty($_POST['address']) && !empty($_POST['postcode']) && !empty($_POST['cardName']) && !empty($_POST['cardNo']) && !empty($_POST['exp']) && !empty($_POST['cvv']))
{
    // open a new connection to the db
    require_once "dbconn.php";

    // sanitise against HTML input
    $address = htmlspecialchars($_POST['address']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $cardNo = htmlspecialchars($_POST['cardNo']);
    $cardName = htmlspecialchars($_POST['cardName']);
    $exp = htmlspecialchars($_POST['exp']);
    $cvv = htmlspecialchars($_POST['cvv']);


    // first, check that the postcode is 4 digits long
    if (strlen($postcode) != 4)
    {
        $_SESSION['errPostcode'] = "Please ensure your postcode is four digits long.";

        header("location: checkout.php");

        // close connection to the db
        mysqli_close($conn);
        exit;
    }

    // then, check that the card number, card cvv, and postcode consist only of numbers
    if (!is_numeric($cardNo) || !is_numeric($cvv) || !is_numeric($postcode))
    {
        $_SESSION['errNumberInput'] = "Please ensure you the number you have entered is valid.";

        header("location: checkout.php");

        // close connection to the db
        mysqli_close($conn);
        exit;
    }


    // then retrieve the items in the cart
    $query = "SELECT * FROM CartProduct WHERE userID=".$_SESSION['userID'].";";
    $cartItems = mysqli_query($conn, $query);

    // for each item in the cart, create an entry in the Purchase table against the one purchase number
    $purchaseNo = 'null';
    while ($item = mysqli_fetch_assoc($cartItems))
    {
        // retrieve the price of the current item
        $query = "SELECT price FROM Product WHERE productID='".$item['productID']."';";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);

        $query = "INSERT INTO Purchase (purchaseNo, userID, productID, dateAndTime, total, quantity, streetAddress, postcode, cardNo, cardName, cardExpiry, cardCVV) VALUES (".$purchaseNo.", ".$_SESSION['userID'].", '".$item['productID']."', '".date('Y-m-d H:i:s')."', ".($product['price'] * $item['quantity']).", ".$item['quantity'].", ?, ?, ?, ?, ?, ?);";

        // prepare statement
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $query);
        mysqli_stmt_bind_param($statement, 'ssssss', $address, $postcode, $cardNo, $cardName, $exp, $cvv);

        if (mysqli_stmt_execute($statement))
        {
            // enter each item in the same transaction against the same purchase number
            $purchaseNo = mysqli_insert_id($conn);

            // update the stock levels in the database
            update_stock($conn, $item['productID'], $item['quantity']);
        }
        else
        {
            $_SESSION['errFieldsEmpty'] = mysqli_error($conn);

            // close the prepared statement
            mysqli_stmt_close($statement);

            // close connection to the db
            mysqli_close($conn);

            header("location: checkout.php");
            exit;
        }

        mysqli_free_result($result);

    }

    // then, after entering the purchase details, remove the items from the cart
    $query = "DELETE FROM CartProduct WHERE userID=".$_SESSION['userID'].";";
    mysqli_query($conn, $query);

    // redirect to payment confirmation page
    header("location: purchase-confirmation.html");

    // close the prepared statement
    mysqli_stmt_close($statement);

    // close connection to the db
    mysqli_close($conn);

}
else
{
    // user has not filled out all fields
    $_SESSION['errFieldsEmpty'] = "Please ensure you fill in all the required fields.";
    header("location: checkout.php");
}

?>