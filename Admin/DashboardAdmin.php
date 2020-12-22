<?php include_once './View/Head.php';?>
    <?php include_once 'ActionSp.php';?>
    <?php include_once 'UploadTT.php'?>
    <h1>WelCome Admin </h1>
    <h1><?php echo $_SESSION['UserName'];?></h1>
    <a href="?Action=Admin&Actionsp=uploadSPCT">Upload TTSPCT</a>
    <a href="?Action=Admin&Actionsp=xemsanpham">Upload hinh anh cua san pham</a>
    <a href="?Action=Admin&Actionsp=uploadkhuyenmai">Upload khuyen mai moi</a>
    <?php include_once './View/Footer.php'; ?>
<?php include_once './View/EndHead.php';?>