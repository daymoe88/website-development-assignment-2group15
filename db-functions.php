<?php

/*
    Function to return a single product corresponding to the provided productID.
    Performs sanitisation on the provided productID.
*/
function get_product_data($conn, $productID)
{
    // create an SQL query to retrieve the details of the product to display
    $query = "SELECT * FROM Product WHERE productID=?;";

    // prepare statement to sanitise productid input
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($productID));

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // if product data retrieved from database successfully, populate the page
        // fetch the results of the sql query
        $product = mysqli_stmt_get_result($statement);
    }
    else
    {
        echo "Error: Unable to retrieve product data.<br>";
        error_log(mysqli_error($conn));
        $product = null;
    }

    // close the prepared statement
    mysqli_stmt_close($statement);

    // return the resultant table
    return $product;
}

/*
    Function to update the stock of a product corresponding to the provided productID.
    Does NOT perform sanitisation on the provided productID and quantity -- assumes already done.
*/
function update_stock($conn, $productID, $quantity)
{
    // retrieve the current stock level
    $query = "SELECT stock FROM Product WHERE productID='".$productID."';";
    if ($result = mysqli_query($conn, $query))
    {
        $stock = mysqli_fetch_assoc($result);

        // deduct the quantity from the current stock
        $newStock = $stock['stock'] - $quantity;

        // update the db
        $query = "UPDATE Product SET stock='".$newStock."' WHERE productID='".$productID."';";
        mysqli_query($conn, $query);
    }

    mysqli_free_result($result);

}

/*
    Function to retrieve products from the database filtered by searched keywords.
    Performs no sanitisation.
*/
function get_all_products($conn)
{
    $query = "SELECT * FROM Product;";

    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free the result set
    mysqli_free_result($result);

    // return the resultant table
    return $products;

}

/*
    Function to retrieve products from the database filtered by searched keywords.
    Removes HTML characters in the provided searchQuery.
*/
function get_products_by_search($conn, $searchQuery)
{
    // create a query to select products based on the console
    $query = "SELECT * FROM Product;";

    $products = array();
    $searchQuery = htmlspecialchars($searchQuery);

    if ($allProducts = mysqli_query($conn, $query))
    {
        $i = 0;
        while ($product = mysqli_fetch_assoc($allProducts))
        {
            // string matching performed on 'name' attribute
            // check if exact match and if match without punctuation
            if (stristr($product['name'], $searchQuery) || stristr(str_replace(['.', ',', ';', ':', '?', '!', '\''], '', $product['name']), $searchQuery))
            {
                $products[$i] = $product;
            }

            $i++;
            
        }

        // free the result set
        mysqli_free_result($allProducts);
    }

    return $products;
}

/*
    Function to return all products in the database corresponding to the provided criteria (console and genre)
    Performs sanitisation on the provided console and genre parameters.
*/
function get_products($conn, $console, $genre)
{
    // first, determine which filtering criteria was used
    if (isset($console))
    {
        // create a query to filter products by console
        $query = "SELECT * FROM Product WHERE console=?;";
        $param = $console;
    }
    else
    {
        // create a query to filter products by genre
        $query = "SELECT * FROM Product WHERE productID IN (SELECT productID FROM ProductGenre WHERE genre=?);";
        $param = $genre;
    }
    
    // prepare statement to sanitise productid input
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($param));

    // execute statement
    if (mysqli_stmt_execute($statement))
    {
        // return the resultant set of products as 2D associative array
        $result = mysqli_stmt_get_result($statement);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // return the result set
        mysqli_free_result($result);
    }
    else
    {
        error_log(mysqli_error($conn));
        $products = null;
    }

    // close the prepared statement
    mysqli_stmt_close($statement);

    // return the resultant table
    return $products;
}



?>