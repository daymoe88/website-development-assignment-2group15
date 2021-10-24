<?php session_start(); ?>

<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Log In | BPL Games</title>
        <meta charset="utf-8">
        <meta name="author" content="Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
    </head>
    <body>
        <div id='login'>
            <h1>Log In</h1>

            <?php
            // input details

            // include a link for forgor password, but don't have to make it do anything

            ?>

            <form action="login-verify.php" method="POST">
                <label for='email'>E-mail Address:</label>
                <input type="email" name="email"></input>
                <label for='password'>Password:</label>
                <input type='password' name='password'></input>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errFieldsIncorrect']."</span>"; // display an error message (if it exists)
                $_SESSION['errFieldsIncorrect'] = "";   // reset the error message for next page refresh/if user leaves page
                ?>
                <?php
                echo "<span class='err-msg'>".$_SESSION['errFieldsEmpty']."</span>";
                $_SESSION['errFieldsEmpty'] = "";
                ?>
                <input type='submit' value='Log In'></input>
            </form>

            <span>Don't have an account? <a href='signup.php'>Click here</a> to create one.</span>

        </div>
    </body>
</html>