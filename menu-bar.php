<?php session_start(); ?>

<ul id="top-panel">
    <!-- <li><a href="products.php"><img src="site-logo" alt="Logo"></a></li> -->
    <?php
    if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'])
    {
        // show account button
        echo "<li><a href='http://localhost/assignment-2/users/user-account.php'>Your Account</a></li>";
    }
    else
    {
        // show sign in and sign up options
        echo "<li><a href='http://localhost/assignment-2/users/login.php'>Log In</a></li>";
        echo "<li><a href='http://localhost/assignment-2/users/signup.php'>Sign Up</a></li>";
        //    <li><a href="user-signin.php">Sign In or Sign Up</a></li> -- this option if we can get on the one page
    }
    ?>
    <li><a href="http://localhost/assignment-2/shopping-cart/shopping-cart.php">Your Cart</a></li>
</ul>