<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout | BPL Games</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style css -->
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php

// connect to the db
require_once "dbconn.php";

include_once "db-functions.php";

// retrieve the contents of the user's cart
$query = "SELECT * FROM CartProduct WHERE userID=".$_SESSION['userID'].";";

if ($result = mysqli_query($conn, $query))
{
    echo "<h1>Your Items</h1>";
    // display each cart item in an unordered list
    echo "<ul>";

    // iterate through each cart item
    while ($cartItem = mysqli_fetch_assoc($result))
    {
        // use the productID of the current item to find the full product details in the Product table
        $productsResult = get_product_data($conn, $cartItem['productID']);
        $product = mysqli_fetch_assoc($productsResult);

        // calculate the total price for the product(s)
        $subtotal = number_format($product['price'] * $cartItem['quantity'], 2, '.', ',');

        // print the details of the product, including buttons to remove the item from the cart and to update the details
        echo "<li>
        <div class='cart-item-details'>
        <span>".$product['name']."</span>
        <span>Quantity: ".$cartItem['quantity']."</span>
        <p>Price: $".$subtotal."</p>
        </div>
        
        </li>";

        // update the current total items and current total price
        $totalItems = $totalItems + $cartItem['quantity'];
        $totalCost = number_format($totalCost + $subtotal, 2, '.', ',');

        mysqli_free_result($productsResult);

    }

    echo "</ul>";

    // provide a short summary of their cart
    echo "<span>Subtotal (".$totalItems." items)</span>";
    echo "<span>$".$totalCost."</span>";

}


?>

<h1>Payment Details</h1>
<div>
    <form id="validate" action="finalise-purchase.php" method='POST'>
        <h3>Delivery Details</h3>
        <div id='shipping-addr'>
            <!--<label for='firstName'>First Name</label>
            <input type="text" name="firstName" placeholder='d'>
            <label for='lastName'>Last Name</label>
            <input type="text" name="lastName" placeholder="e.g Singh">-->
            <label for='address'>Address</label>
            <input type="text" name="address" placeholder="11 Grand Avenue, Woodville North">
            <!--<label for='city'>City</label>
            <input type="text" name="city" placeholder="e.g Adelaide">
            <label for='state'>State</label>
            <input type="text" name="state" placeholder="e.g South Australia">
            <select name='state'>
                <option value='ACT'>ACT</option>
                <option value='NSW'>New South Wales</option>
                <option value='NT'>Northern Territory</option>
                <option value='QLD'>Queensland</option>
                <option value='SA'>South Australia</option>
                <option value='TAS'>Tasmania</option>
                <option value='VIC'>Victoria</option>
                <option value='WA'>Western Australia</option>
            </select>-->
            <label for='postcode'>Postcode</label>
            <input type="text" name="postcode" placeholder="e.g 5000">
            <?php
            echo "<span class='err-msg'>".$_SESSION['errPostcode']."</span>";
            $_SESSION['errPostcode'] = "";
            ?>
        </div>
        <div id='payment-details'>
            <h3>Payment</h3>
            <label for='cardName'>Name on Card</label>
            <input type="text" name="cardName" placeholder="e.g Parmveer Singh">
            <label for='cardNo'>Credit card number</label>
            <input type="text" name="cardNo" placeholder="e.g 1111 2222 3333 4444">
            <label for='exp'>Expiry Date</label>
            <input type='month' name='exp'>
            <!--<label for='expmonth'>Expiration Month</label>
            <select name='expmonth'>
                <option value='Jan'>01</option>
                <option value='Feb'>02</option>
                <option value='Mar'>03</option>
                <option value='Apr'>04</option>
                <option value='May'>05</option>
                <option value='Jun'>06</option>
                <option value='Jul'>07</option>
                <option value='Aug'>08</option>
                <option value='Sep'>09</option>
                <option value='Oct'>10</option>
                <option value='Nov'>11</option>
                <option value='Dec'>12</option>
            </select>
            <input type="text" name="expMonth" placeholder="e.g March">
            <label for='expyear'>Expiration Year</label>
            <select name='expyear'>
                <option value='2021'>2021</option>
                <option value='2022'>2022</option>
                <option value='2023'>2023</option>
                <option value='2024'>2024</option>
                <option value='2025'>2025</option>
            </select>
            <input type="text" name="expYear" placeholder="e.g 2023">-->
            <label for='cvv'>CVV</label>
            <input type="text" name="cvv" placeholder="e.g 123">
            <?php
            echo "<span class='err-msg'>".$_SESSION['errFieldsEmpty']."</span>";
            $_SESSION['errFieldsEmpty'] = "";
            ?>
            <?php
            echo "<span class='err-msg'>".$_SESSION['errNumberInput']."</span>";
            $_SESSION['errNumberInput'] = "";
            ?>
        </div>
        </label>
        <input type="submit" class="btn" value="Finalise Transaction">
        <input type='submit' class='btn' value='Cancel' formaction='shopping-cart/shopping-cart.php?userID=<?php echo $_SESSION['userID']; ?>'>
     </form>
</div>

<?php 

mysqli_free_result($result);

// close connection to the db
mysqli_close($conn);

?>
</body>
</html>
