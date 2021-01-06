<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include_once './Controller/BuyProductController.php';
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $Address = $_POST['Address'];
        $city = $_POST['city'];
        $quan = $_POST['quan'];
        $UserId = $_POST['UserId'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Submit = $_POST['DoCheckOut'];
        $sameadr = $_POST['sameadr'];
        //Check kieu thanh toan
        $cdelivery = $_POST['cdelivery'];
        $Thanhtien = $_POST['ThanhTien'];
        $resultSP = $_POST['resultSP'];
        $resultquantity = $_POST['resultquantity'];
        
        $KhachHangMua = new BuyProductController();
        $KhachHangMua->xuLyCheckOutKhongCard($Submit,$UserId, $fullname, $email, $Address, $city, $quan, $PhoneNumber, $cdelivery, $Thanhtien, $sameadr, $resultSP, $resultquantity);
        ?>
</body>
</html>