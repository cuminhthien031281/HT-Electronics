<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        use PHPMailer\PHPMailer\PHPMailer;
        require_once 'PhpMailer/PHPMailer-master/src/PHPMailer.php';
        require_once 'PhpMailer/PHPMailer-master/src/SMTP.php';
        require_once 'PhpMailer/PHPMailer-master/src/Exception.php';
        $message = file_get_contents('Admin/QuanLyDonHang/MailForm.php');
        echo $message;
        //$Mail =new PHPMailer();
        
        //$Mail->isSMTP();
        //$Mail->SMTPAuth = true;
        //$Mail->Host = 'smtp.gmail.com';
        //$Mail->Username = 'bqhuy.19it4@vku.udn.vn';
        //$Mail->Password = 'God26112001';
        //$Mail->SMTPSecure = 'tls';
        //$Mail->Port = 25;
        //$Mail->isHTML(true);
        //$Mail->SetFrom("no-reply@HT-Electronics.org");
        //$Mail->Subject = 'Don Hang Cua Ban Da Duoc Xac Nhan';
        //$Mail->msgHTML($message);
        //$mail->CharSet="utf-8";
        //$Mail->addAddress("kendarknight26112001@gmail.com");
        //if($Mail->send()) {
            //echo "Success";
        //} else {
            //echo "Faile: " . $Mail->ErrorInfo;
            
        //}
     ?>
</body>
</html>