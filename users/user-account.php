<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Your Account | BPL Games</title>
        <meta charset="utf-8">
        <meta name="author" content="Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
    </head>
    <body>
        <?php require_once "../menu-bar.php"; ?>

        <div id='account-details'>
            <h1>Your Account</h1>
            <?php
            // connect to the db
            require_once "../dbconn.php";

            // retrieve all the items corresponding to the users id
            $query = "SELECT * FROM UserAccount WHERE userID=".$_SESSION['userID'].";";

            if ($result = mysqli_query($conn, $query))
            {
                $user = mysqli_fetch_assoc($result);

                // list the details in an unordered list
                echo "<ul>
                <li>Name: ".$user['firstName']." ".$user['lastName']."</li>
                <li>Email Address: ".$user['email']."</li>
                <li>Street Address: ".$user['streetAddress']."</li>
                <li>Postcode: ".$user['postcode']."</li>
                </ul>";

            }

            mysqli_free_result($result);

            ?>

            <a href='modify-user-details.php'>Update Your Details</a>
        </div>

        <div id='order-history'>
            <h1>Your Order History</h1>

            <?php
            // retrieve all past purchases corresponding to the users id in order of when they were made
            $query = "SELECT * FROM Purchase WHERE userID=".$_SESSION['userID']." ORDER BY dateAndTime DESC;";

            if ($result = mysqli_query($conn, $query))
            {
                // only proceed if the user has made any purchases before
                if (mysqli_num_rows($result) >= 1)
                {
                    // display each purchase in a new row in a table
                    echo "<table>
                    <tr>
                        <th>Purchase Number</th>    
                        <th>Product Name</th>
                        <th>Date and Time</th>
                        <th>Amount</th>
                        <th>Delivery Address</th>
                        <th>Status</th>
                    </tr>";

                    // iterate through each purchase
                    while ($purchase = mysqli_fetch_assoc($result))
                    {
                        // modify the datetime format
                        $date = date_create($purchase['dateAndTime']);

                        // retrieve the product name from the productID
                        $query = "SELECT name FROM Product WHERE productID='".$purchase['productID']."';";
                        $productResult = mysqli_query($conn, $query);
                        $product = mysqli_fetch_assoc($productResult);

                        // print the details of the purchase
                        echo "<tr>
                        <td>".$purchase['purchaseNo']."</td>
                        <td>".$product['name']."</td>
                        <td>".date_format($date, DATE_RFC7231)."</td>
                        <td>$".$purchase['total']."</td>
                        <td>".$purchase['streetAddress'].", ".$purchase['postcode']."</td>
                        <td>Delivered.</td>
                        </tr>";

                        mysqli_free_result($productResult);
                    }

                    echo "</table>";

                }
                else
                {
                    // if the user has not made any purchases
                    echo "You have not made any purchases yet.";
                }
            }

            mysqli_free_result($result);

            // close connection to the db
            mysqli_close($conn);

            ?>
        </div>
        <a href='logout.php'>Logout</a>
        <a href='delete-account.php'>Delete Your Account</a>
    </body>
</html>