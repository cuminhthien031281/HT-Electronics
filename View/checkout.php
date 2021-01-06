<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    padding: 8px;
}


h2 {
    text-align: center;
}



* {
    box-sizing: border-box;
} 

.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.col-25 {
    -ms-flex: 25%;
    flex: 25%;
}

.col-50 {
    -ms-flex: 50%;
    flex: 50%;
}

.col-75 {
    -ms-flex: 75%;
    flex: 75%;
}

.col-25,.col-50,.col-75 {
    padding: 0 16px;
}

.container {
    background-color: #cfcccc85;
    padding: 3px 18px 13px 18px;
    border: 1px solid lightgrey;
    border-radius: 3px;
}

input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border:  1px solid #ccc;
    border-radius: 3px;
}

label {
    margin-bottom: 10px;
    display: block;
}

.icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
}

btn {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
}

.btn:hover {
    background-color: #4CAF59;
}

a{ 
    border: 1px solid lightgray;
}

span.price {
    float: right;
    color: grey;
}
    </style>
</head>
<body>
<?php
                    $total = 0; 
                    $Associate = array();
                    if(isset($_SESSION['cart'])) {
                        
                        foreach($_SESSION['cart'] as $key => $value) {
                            $total += $value['gia'] * $value['quantity_SP'];
                            
                    ?>       
                    <?php 
                        }
                        
                        for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                            $Associate[$i]['id_sp'] = $_SESSION['cart'][$i]['id_sp'];
                            $Associate[$i]['quantity'] = $_SESSION['cart'][$i]['quantity_SP'];
                        }

                        
                    }
                    
                    
                    ?>
    <h2>Responsive Checkout Form</h2>
    <div class="row">
        <div class="col-75">
            <div class="container">
                
                    <div class="row">
                        <div class="col-58">
                            <h3>Billing Address</h3>
    <?php if($_SESSION['Delivery_type'] == "CashOnCard") {?>
        <form action="?Action=DoCheckOutCard" method="POST">
            <label for="fname"><i class="fa fa-user"></i>Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="Input your name">
            
            <label for="email"><i class="fa fa-envelope"></i>Email</label>
            <input type="text" id="email" name="email" placeholder="HuyBui@gmail.com"> 

            <label for="Address"><i class="fa fa-address-caed-o"></i>Address</label>
            <input type="text" id="Address" name="Address" placeholder="452 Nguyen Tri Phuong">
            <label for="PhoneNumber">Phone Number</label>
            <input type="number" minlength="8" name="PhoneNumber">
            <label for="city"><i class="fa fa-institution"></i>City</label>
            <input type="text" id="city" name="city" placeholder="Da Nang">
            <input type="hidden" name="UserId" value="<?php echo $_SESSION['KhachHang_Id']?>">
            <input type="hidden" name="Array_SP" value=>
            
            <div class="row">
                <div class="col-50">
                    <label for="quan">Quan</label>
                    <input type="text" id="quan" name="quan" placeholder="Hai Chau">
                </div>
            </div>

            <div class="col-50">
                
                    <h3>Payment</h3>
                    <label for="fname">Accepted Card</label>
                    <input type="hidden" id="cdelivery" name="cdelivery" value="<?php echo $_SESSION['Delivery_type'];?>" >
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
                    <label><input type="checkbox" checked="checked" name="sameadr" >Shipping address same as billing</label>
                    <input type="hidden" name="ThanhTien" value="<?php echo $total;?>">
                    <button type="submit" value="Buy" class="btn" name="DoCheckOut">Mua</button>
            </form>
                <?php } else {?>
                    <form action="?Action=DoCheckOutNoCard" method="POST">
                    <?php 
                        foreach($Associate as $keys) {
                            echo '<input type="hidden" name="resultSP[]" value="'.$keys['id_sp']. '">';
                            echo '<input type="hidden" name="resultquantity[]" value="'.$keys['quantity']. '">';
                        }
                    ?>
                        <label for="fname"><i class="fa fa-user"></i>Full Name</label>
                        <input type="text" id="fname" name="fullname" placeholder="Input your name">
            
                        <label for="email"><i class="fa fa-envelope"></i>Email</label>
                        <input type="text" id="email" name="email" placeholder="HuyBui@gmail.com"> 

                        <label for="Address"><i class="fa fa-address-caed-o"></i>Address</label>
                        <input type="text" id="Address" name="Address" placeholder="452 Nguyen Tri Phuong">
                        <label for="PhoneNumber">Phone Number</label>
                        <input type="number" minlength="8" name="PhoneNumber">
                        <label for="city"><i class="fa fa-institution"></i>City</label>
                        <input type="text" id="city" name="city" placeholder="Da Nang">
                        <input type="hidden" name="UserId" value="<?php echo $_SESSION['KhachHang_Id']?>">
            
            
                        <div class="row">
                            <div class="col-50">
                                <label for="quan">Quan</label>
                                <input type="text" id="quan" name="quan" placeholder="Hai Chau">
                            </div>
                        </div>
                        <label for="cdelivery">You choose card on delivery</label>
                        <input type="text" id="cdelivery" name="cdelivery" value="<?php echo $_SESSION['Delivery_type'];?>" readonly>
                        <label><input type="checkbox" checked="checked" name="sameadr" >Shipping address same as billing</label>
                        <input type="hidden" name="ThanhTien" value="<?php echo $total;?>">
                        <button type="submit" value="Buy" class="btn" name="DoCheckOut">Mua</button>
            </form>
                <?php } ?>
            </div>
            
           
            
                        </div>
                    </div>
                    
            
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