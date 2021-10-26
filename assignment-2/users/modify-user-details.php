<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Your Account | BPL Games</title>
        <meta charset="utf-8">
        <meta name="author" content="Brad Dayman/Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <?php require_once "../menu-bar.php"; ?>

        <div id='update-account-details'>
            <h1>Update Your Account</h1>
            <?php
            // connect to the db
            require_once "../dbconn.php";

            // retrieve all the items corresponding to the users id
            $query = "SELECT * FROM UserAccount WHERE userID=".$_SESSION['userID'].";";

            if ($result = mysqli_query($conn, $query))
            {
                $user = mysqli_fetch_assoc($result);

                // list the details in a form
                ?>
                <form action='user-account.php' method='POST'>
                <label for='firstName'>First Name:</label>
                <input type='text' name='firstName' value='<?php echo $user['firstName']; ?>'></input>
                <label for='lastName'>Last Name:</label>
                <input type='text' name='lastName' value='<?php echo $user['lastName']; ?>'></input>
                <label for='email'>Email:</label>
                <input type='email' name='email' value='<?php echo $user['email']; ?>'></input>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errEmail']."</span>";
                $_SESSION['errEmail'] = "";
                ?>
                <label for='address'>Delivery Address:</label>
                <input type='text' name='address' value='<?php echo $user['streetAddress']; ?>'></input>
                <label for='postcode'>Postcode:</label>
                <input type='text' name='postcode' value='<?php echo $user['postcode']; ?>' maxlength='4' min='1000' max='9999'></input>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errPostcode']."</span>";
                $_SESSION['errPostcode'] = "";
                ?>
                <label for='password'>New Password:</label>
                <input type='password' name='password'></input>
                <label for='passwordConfirm'>Confirm New Password:</label>
                <input type='password' name='passwordConfirm'></input>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errPassword']."</span>";
                $_SESSION['errPassword'] = "";
                ?>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errFieldsEmpty']."</span>";
                $_SESSION['errFieldsEmpty'] = "";
                ?>
                <input type='submit' value='Save' formaction='save-user-details.php'></input>
                <input type='submit' value='Cancel'></input>
                </form>

                <?php

                mysqli_free_result($result);

            }

            // close connection to the db
            mysqli_close($conn);

            ?>

        </div>
    </body>
</html>