<?php include_once './View/Head.php'; ?>
<?php include_once 'ActionSp.php'; ?>
<?php include_once 'UploadTT.php' ?>
    <h1>WelCome Admin </h1>
    <h1><?php echo $_SESSION['UserName']; ?></h1>
    <a href="?Action=Home" style="display: block;">Trang Chu</a>
    <a href="?Action=Admin&Actionsp=uploadSPCT" style="display: block;">Upload TTSPCT</a>
    <a href="?Action=Admin&Actionsp=xemsanpham" style="display: block;">Upload hinh anh cua san pham</a>
    <a href="?Action=Admin&Actionsp=uploadkhuyenmai" style="display: block;">Upload khuyen mai moi</a>
    <a href="?Action=Admin&Actionsp=uploadthongsokithuat" style="display: block;">Upload thong so ki thuat cho san pham</a>
    <a href="?Action=Logout">Logout</a>
<?php include_once './View/Footer.php'; ?>
<?php include_once './View/EndHead.php'; ?>