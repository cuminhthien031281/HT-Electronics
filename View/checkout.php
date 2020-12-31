<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Public/css/checkout.css">
</head>
<body>
    <h2>Responsive Checkout Form</h2>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="?Action=Purchase" method="POST">
                    <div class="row">
                        <div class="col-58">
                            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i>Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Input your name">
            
            <label for="email"><i class="fa fa-envelope"></i>Email</label>
            <input type="text" id="email" name="email" placeholder="HuyBui@gmail.com"> 

            <label for="Address"><i class="fa fa-address-caed-o"></i>Address</label>
            <input type="text" id="Address" name="Address" placeholder="452 Nguyen Tri Phuong">

            <label for="city"><i class="fa fa-institution"></i>City</label>
            <input type="text" id="city" name="city" placeholder="Da Nang">
            
            <label for="city"><i class="fa fa-institution"></i>City</label>
            <input type="text" id="city" name="city" placeholder="Da Nang">
            
            <div class="row">
                <div class="col-50">
                    <label for="quan">Quan</label>
                    <input type="text" id="quan" name="quan" placeholder="Hai Chau">
                </div>
            </div>

            <div class="col-50">
                <h3>Payment</h3>
                <?php if($_POST['flexRadioDefault'] == "CashOnCard") {?>
                    <label for="fname">Accepted Card</label>
                    <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color: navy;"></i>
                        <i class="fa fa-cc-amex" style="color: blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color: red;"></i>
                        <i class="fa fa-cc-discover" style="color: orange;"></i>
                    </div>

                    <label for="cname">Name On Card</label>
                    <input type="text" id="cname" name="cardname" placeholder="Bui Quoc Huy">

                    <label for="ccnum">Credit On Card</label>
                    <input type="text" id="ccnum" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX">

                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="expmonth" name="expmonth" placeholder="September">

                    <div class="row">
                        <div class="col-50">
                            <label for="expyear">Exp year</label>
                            <input type="text" id="expyear" name="expyear" placeholder="352">
                        </div>
                        <div class="col-50">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="532">
                        </div>
                    </div>
                <?php } else {?>
                    <label for="fname">Card on delivery</label>

                    <label for="cdelivery">You choose card on delivery</label>
                    <input type="text" id="cdelivery" name="cdelivery" value="Cash on delivery" readonly>
                <?php } ?>
            </div>
            <label><input type="checkbox" checked="checked" name="sameadr">Shipping address same as billing</label>
            <input type="submit" value="Continue To checkbox" class="btn">
            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-25">
            <div class="container">
                    <?php 
                        $count= 0;
                        if(isset($_SESSION['cart'])) {
                            $count= count($_SESSION['cart']);
                        }
                    ?>
                <h4>Card<span class="price" style="color: black;"><i class="fa fa-shopping-cart"></i><b><?php echo $count;?></b></span></h4>
                <?php
                    $total = 0; 
                    if(isset($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $key => $value) {
                            $total += $value['gia'] * $value['quantity_SP'];
                            echo "<p><a href='#'>$value[ten_sp]</a><span class='price'>$value[gia]</span> x <span class='quantity'>$value[quantity_SP]</span></p>";    
                ?>       
                <?php 
                        }
                    } 
                ?>
                        <hr>
                        <p>Total: <span class="price" style="color:black;"><b>$<?php echo $total;?></b></span></p>
            </div>
        </div>
    </div>
</body>
</html>