<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Your Account | BPL Games</title>
        <meta charset="utf-8">
        <meta name="author" content="Brad Dayman/Laura Spencer"/>
        <meta name="description" content="Assignment 02"/>
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

            }

            mysqli_free_result($result);

            // close connection to the db
            mysqli_close($conn);

            ?>

        </div>
    </body>
</html>

<!-- <!DOCTYPE html>
<html lang= "en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Prac-2">
  <meta name="author" content="Brad Dayman">
  <title Practical 2 ></title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>  
  <form action="checkout.html" action="GET">
  <div class="ex1">
  <div class="content"> -->
  <!-- <div class="container"> -->
<!--  <div class="input">

<h2><b> Account details.</b></h2>
<br>

<label id = title >  Title </label> -->
<!-- <input type="text" minlength="2"placeholder="required" required/> -->
<!--Mr. <input type="radio" name="title"
→ value=" Mr."/>
Mrs. <input type="radio" name="title"
→ value=" Mrs."/>
Ms. <input type="radio" name="title"
→ value=" Ms."/>
<br/>

      <label id = name > First Name <br> </label>
      <input type="text" name="firstname" minlength="2" placeholder="required" required/>
<br>
<label id = name > Last Name <br> </label>
      <input type="text" name="lastname" minlength="2" placeholder="required" required/>
<br>

      <label id=age> <br> Date of Birth <br> </label>
      <input type="number" name="dob" min="10" max="100" required/>
<br>
      <label id=email> <br> E-mail address <br> </label>
      <input type="email" name="email" required />
      <br>
      <label id=address> <br> Home Address <br> </label>
      <input type="adress" name="homeaddress" required />
      <br>
      <label id=postcode> <br> Postcode <br> </label>
      <input type="number" min="4" max="4" required/>
      <br>
    
      <label id=contactnumber> <br> Contact Number <br> </label>
      <input type="number" min="10" max="12" required/>
      <br>

      <label id = address > <br> Home Address <br> </label>
      <input type="text" minlength="2" placeholder="required" required/>
      <br>

      <label id=carddetails> <br> Creditcard Number <br> </label>
      <input type="number" min="10" max="16" required/>
      <br>

      <label id=cardccv> <br> Creditcard CCV Number <br> </label>
      <input type="number" min="3" max="3" required/>
      <br>
      <br>
      <br>
      <input type="submit" id= "submit" class="button" value="Save"> -->
      <!-- <button on click="getparam" id="submit">submit</button> -->
      <!-- <input type="submit" id= "submit" class="button" value="Cancel">

    </form> 
 </div> 
</div>
</div> -->
<!-- </div> -->

<!-- </body>
</html> -->