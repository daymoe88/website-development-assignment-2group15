<!DOCTYPE html>
<html lang=en>
    <?php
    include_once "db-functions.php";

    // connect to the db
    require_once "dbconn.php";
    ?>
    <head>
        <title>Home | BPL Games</title>
        <meta charset="utf-8">
        <meta name="author" content="Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
        <link rel='stylesheet' href='styles/style.css'>
    </head>
    <body>
        <?php require_once "menu-bar.php"; ?>
        <div id="products">
            <?php

            // first, apply a filter to the products based on the user's input
            if (isset($_GET['console']) || isset($_GET['genre']))
            {
                // the user filtered either by console or by genre
                // display a header for the results
                echo "<h1>".$_GET['console'].$_GET['genre']." Games:</h1>";

                echo "get";

                $products = get_products($conn, $_GET['console'], $_GET['genre']);
            }
            else if (!empty($_GET['search']))
            {
                // user used the search bar
                $products = get_products_by_search($conn, $_GET['search']);

                // display a header for the results
                echo "<h1>".count($products)." search results for: ".$_GET['search']."</h1>";
            }
            else
            {
                // by default, display all the products separated by console
                $products = get_all_products($conn);

                echo "<h1>BPL Games</h1>";

                //echo "<h1>Nintendo Switch Games:</h1>";
            }

            
            if (count($products) != 0)
            {
                // iterate through all products, displaying each in their own div
                foreach ($products as $product)
                {
                    echo "<div>
                    <a class='product-display' href='product-information.php?productID=".$product['productID']."'>
                    <img class='product-image' src='".$product['image']."' alt='Image Not Available'>
                    <span>".$product['name']."</span>
                    <span>$".$product['price']."</span>
                    </a>
                    </div>";
                    //echo $product['productID']."<br>";
                }
            }
            else
            {
                // if no products, let the user know
                echo "No results found.";
            }

            // close connection to the db at the end
            mysqli_close($conn);
            
            ?>
        </div>
    </body>
</html>