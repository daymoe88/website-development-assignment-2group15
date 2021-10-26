<!DOCTYPE html>
<html>
<head>
    <title>Checkout | BPL Games</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    
    
    <!-- style css -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<h2>Payment Gateway Method</h2>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form id="validate" action="home.php" method='POST'>
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label> Full Name</label>
                        <input type="text" id="fname" name="fullname" placeholder="e.g Parmveer Singh">
                        <label> Email</label>
                        <input type="text" id="email" name="email" placeholder="abc@gmail.com" required>
                        <label> Address</label>
                        <input type="text" id="adr" name="address" placeholder="11 Grand Avenue, Woodville North" required>
                        <label> City</label>
                        <input type="text" id="city" name="city" placeholder="e.g Adelaide" required>

                        <div class="row">
                            <div class="col-50">
                                <label>State</label>
                                <input type="text" id="state" name="state" placeholder="e.g South Australia"required>
                            </div>
                            <div class="col-50">
                                <label>Postcode</label>
                                <input type="text" id="postcode" name="postcode" placeholder="e.g 5000"required>
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>

                        <label>Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="e.g Parmveer Singh"required>
                        <label>Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="e.g 1111 2222 3333 4444"required>
                        <label>Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="e.g March"required>
                        <div class="row">
                            <div class="col-50">
                                <label>Exp Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="e.g 2023"required>
                            </div>
                            <div class="col-50">
                                <label>CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="e.g 123"required>
                            </div>
                        </div>
                    </div>
                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
                <input type="submit" class="btn" value="Finalise Transaction">
            </form>
        </div>
    </div>
   </div>
</div>
<!-- script validate js -->
<script>
    $('#validate').validate({
        roles: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            zip: {
                required: true,
            },
            cardname: {
                required: true,
            },
            cardnumber: {
                required: true,
            },
            expmonth: {
                required: true,
            },
            expyear: {
                required: true,
            },
            cvv: {
                required: true,
            },
           
        },
        messages: {
            fullname:"Please input full name*",
            email:"Please input email*",
            city:"Please input city*",
            address:"Please input address*",
            state:"Please input state*",
            zip:"Please input address*",
            cardname:"Please input card name*",
            cardnumber:"Please input card number*",
            expmonth:"Please input exp month*",
            expyear:"Please input exp year*",
            cvv:"Please input cvv*",
        },
    });
</script>
</body>
</html>