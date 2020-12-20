<?php include_once './View/Head.php';?>
    <form action="?Action=Admin&Actionsp=uploadhinhanhcuasanpham" method="POST" enctype="multipart/form-data">
        <h2>Hinh Anh cua san pham</h2>
        <input type="file" name="file">
        <button type="submit" name="SubmitHinhAnh" value="SubmitImageSanPham">Submit Image</button>
    </form>

<?php include_once './View/Footer.php';?>
<?php include_once './View/EndHead.php';?>