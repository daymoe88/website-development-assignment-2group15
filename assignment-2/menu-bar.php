<?php session_start(); ?>

<ul id="top-panel">
    <li><a id='logo' href="http://localhost/assignment-2/home.php">BPL Games</a></li>
    <form action='http://localhost/assignment-2/home.php' method='GET'>
        <input type='text' name='search' placeholder='Search..'></input>
        <input type='submit' name='searchBtn' value='Search'></input>
        <input type='submit' class='console' value='Nintendo Switch'></input>
        <input type='submit' class='console' value='PlayStation 4'></input>
        <input type='submit' class='console' value='PlayStation 5'></input>
        <input type='submit' class='console' value='Xbox One'></input>
        <input type='submit' class='console' value='Xbox Series X'></input>
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