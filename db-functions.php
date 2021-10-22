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

?>