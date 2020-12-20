<?php include_once './View/Head.php';?>
    <?php include_once 'ActionSp.php';?>
    <h1>WelCome Admin </h1>
    <h1><?php echo $_SESSION['UserName'];?></h1>
    <a href="?Action=Admin&Actionsp=uploadSPCT">Upload SPCT</a>
    <?php include_once './View/Footer.php'; ?>
<?php include_once './View/EndHead.php';?>