<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Your Cart | BPL Games</title>
        <meta charset="utf-8">
        <meta name="author" content="Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
    </head>
    <body>
        <?php require_once "../menu-bar.php"; ?>
        <div id="cart-items">
            <h1>Your Shopping Cart</h1>
            <?php
            include_once "../db-functions.php";

            // connect to the db
            require_once "../dbconn.php";

            // select the items corresponding to the users id (retrieved from the user's session data)
            $query = "SELECT * FROM CartProduct WHERE userID=".$_SESSION['userID'].";";

            if ($result = mysqli_query($conn, $query))
            {
                // only proceed if the user has any cart items
                if (mysqli_num_rows($result) >= 1)
                {
                    // display each cart item in an unordered list
                    echo "<ul>";

                    // establish variables to contain the total item count and total price
                    $totalItems = 0;
                    $totalCost = 0;

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
                        <div class='cart-item'>
                        <img src='../".$product['image']."' alt='Image Not Available'>
                        ".$product['name']."
                        <form action='remove-from-cart.php' method='POST'>
                        <input type='hidden' name='productID' value='".$product['productID']."'></input>
                        <label for='quantity'>Quantity:</label>
                        <input type='number' name='quantity' min='1' max='".$product['stock']."' value='".$cartItem['quantity']."'></input>
                        <input type='submit' value='Update Order' formaction='update-order.php'></input>
                        <input type='submit' value='Remove From Cart'></input>
                        <p>Price: $".$subtotal."</p>
                        </form>
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

                    // allow the user to proceed to checkout their cart
                    echo "<button type='submit' formaction='../checkout.php' formmethod='POST'>Proceed to Checkout</button>";

                }
                else
                {
                    // if the user has an empty cart
                    echo "There are no items in your cart";
                }

                mysqli_free_result($result);

            }
            else
            {
                echo "There are no items in your cart. Please <a href='../users/login.php'>Log In</a> or <a href='../users/signup.php'>Sign Up</a> to begin making purchases.";
            }

            // close connection to the db
            mysqli_close($conn);

            ?>
        </div>
    </body>
</html>