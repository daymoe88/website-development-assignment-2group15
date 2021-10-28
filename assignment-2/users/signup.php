<?php session_start(); ?>

<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Sign Up | BPL Games</title>
        <meta charset="utf-8">
        <meta name="author" content="Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>
        <div id='sign-up'>
            <h1>Enter Your Details</h1>

            <form action="signup-verify.php" method="POST">
                <label for='firstName'>First Name:</label>
                <input type='text' name='firstName'></input>
                <label for='lastName'>Last Name:</label>
                <input type='text' name='lastName'></input>
                <label for='email'>E-mail Address:</label>
                <input type="email" name="email"></input>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errEmail']."</span>"; 
                $_SESSION['errEmail'] = "";
                ?>
                <label for='password'>Password:</label>
                <input type='password' name='password'></input>
                <label for='confirmPassword'>Confirm Password:</label>
                <input type='password' name='confirmPassword'></input>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errPassword']."</span>";
                $_SESSION['errPassword'] = "";
                ?>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errFieldsEmpty']."</span>";
                $_SESSION['errFieldsEmpty'] = "";
                ?>
                <input type='submit' value='Sign Up'></input>
            </form>

            <span>Already have an account? <a href='login.php'>Click here</a> to log in.</span>

        </div>
    </body>
</html>