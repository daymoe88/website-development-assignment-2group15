<?php session_start(); ?>

<ul id="top-panel">
    <!-- <li><a href="home.php"><img src="site-logo" alt="Logo"></a></li> -->
    <form action='home.php' method='GET'>
        <input type='text' name='search' placeholder='Search..'></input>
        <input type='submit' name='searchBtn' value='Search'></input>
        <input type='submit' name='console' value='Nintendo Switch'></input>
        <input type='submit' name='genre' value='Open World'></input>
    </form>
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