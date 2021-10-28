<!DOCTYPE html>
<html lang=en>
    <?php
    include_once "db-functions.php";

    // connect to the db
    require_once "dbconn.php";

    // if the provided productID is valid
    if (isset($_GET['productID']))
    {
        // get the product associated with the id
        $result = get_product_data($conn, $_GET['productID']);
        $product = mysqli_fetch_assoc($result);

        // if the retrieved table is empty
        if (!$product)
        {
            echo "Error: Invalid product selected.";

            // free the result set
            mysqli_free_result($result);

            // close connection to the db
            mysqli_close($conn);
            exit;
        }

    }
    else
    {
        echo "Error: Invalid product selected.";
        // close connection to the db
        mysqli_close($conn);
        exit;
    }
    ?>
    <head>
        <title><?php echo $product['name']." | BPL Games";?></title>
        <meta charset="utf-8">
        <meta name="author" content="Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
        <link rel="stylesheet" href="styles/styles.css">
        <script src='scripts/script.js' defer></script>
    </head>
    <body>
        <?php require_once "menu-bar.php"; ?>
        <div id="product">
            <img class='product-image' src='<?php echo $product['image']; ?>' alt="Image Not Available">
            <div id="product-details">
                <h1><?php echo $product['name']; ?></h1>
                <p><?php echo $product['descr']; ?></p>
                <p>Price: $<?php echo $product['price']; ?></p>
                <?php
                // only allow the user to purchase if there are any items in stock
                if ($product['stock'] == 0)
                {
                    // if there is no stock, display an Out of Stock message
                    echo "<span>Out of Stock</span>";
                }
                else
                {
                ?>
                <form action='shopping-cart/add-to-cart.php?return=product-information.php?productID=<?php echo $product['productID']; ?>' method='POST'>
                    <input type='hidden' name='productID' value='<?php echo $product['productID'];?>'></input>
                    <label for='quantity'>Quantity:</label>
                    <input type='number' name='quantity' min='0' max=<?php echo $product['stock']; ?> value='1'></input>
                    <?php
                    // check the status of this item in the user's current shopping cart
                    // note that it's safe to embed $product['productID'] directly into the query here
                    $query = "SELECT * FROM CartProduct WHERE userID=".$_SESSION['userID']." AND productID='".$product['productID']."';";
                    if ($cartItems = mysqli_query($conn, $query))
                    {
                        if (mysqli_num_rows($cartItems) != 0)
                        {
                            // if the item is already in the cart, the button should direct the user to their cart
                            echo "<input type='submit' value='Go To Cart' formaction='shopping-cart/shopping-cart.php'></input>";
                        }
                        else
                        {
                            // if instead the item is not already in the user's cart, they should be able to add it here:
                            echo "<input type='submit' value='Add To Cart'></input>";

                            // or they should be able to buy it immediately
                            echo "<input type='submit' value='Buy Now' formaction='shopping-cart/add-to-cart.php?return=checkout.php'></input>";
                        }

                        mysqli_free_result($cartItems);
                    }
                    else
                    {
                        // query will fail if no userID, ie if the user is not logged in
                        echo "Please log in to purchase this item.";
                    }

                    ?>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
        <?php

        // free the result set at the end
        mysqli_free_result($result);

        // close connection to the db at the end
        mysqli_close($conn);
        ?>
    </body>
</html>