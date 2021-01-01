<?php 
    session_start();    
    include_once './Controller/LoginController.php';
    include_once './Controller/RegisterController.php';
    include_once './Controller/AdminController.php';
    include_once './Controller/BuyProductController.php';
    $actView = isset($_GET['Action']) ? $_GET['Action'] : "Home";
    switch ($actView) {
        case "Home": 
            require_once './View/Home.php';
            break;
        case "Login":
            require_once './View/Login.php';
            break;
        case "Register": 
            require_once './View/Register.php';
            break;
        case "logUserIn": 
            $UserNameInputLogin = $_POST['TenDangNhap'];
            $PasswordInputLogin = $_POST['MatKhau'];
            $SubmitFormLogin  = $_POST['SubmitLogin'];
            $LoginController = new LoginController();
            $LoginController->Login($UserNameInputLogin, $PasswordInputLogin, $SubmitFormLogin);
            break;
        case "regUserIn": 
            $UserNameInputRegister = $_POST['TenDangKy'];
            $EmailInputRegister = $_POST['Email'];
            $PasswordInputRegister = $_POST['MatKhauDangKy'];
            $SubmitFormRegister = $_POST['Register'];
            $RegisterController = new RegisterController();
            $RegisterController->RegisterUser($UserNameInputRegister, $EmailInputRegister, $PasswordInputRegister, $SubmitFormRegister);
            break;
        case "Logout": 
            include_once './Controller/Logout.php';
            break;
        case "Admin": 
            include_once './Admin/Home.php';
            break;
        case "SanPhamAdmin": 
            include_once './Admin/QuanLySanPham/ThemXoaChinhSuaSP.php';
            break;
        case "ChinhSuaSanPham_UI": 
            include_once './Admin/QuanLySanPham/ChinhSuaSanPhamUI.php';
            break;
        case "uploadsanpham": 
            $TenSPCT = $_POST['TenSPCT'];
            $TenHMTDM = $_POST['TenHMTDM'];
            $DonGia = $_POST['DonGia'];
            $SoLuong = $_POST['SoLuong'];
            $ValueSubmit = $_POST['SubmitTTSP'];
            $AdminController = new AdminController();
            $AdminController->UploadTTSP($TenSPCT, $TenHMTDM, $DonGia, $SoLuong, $ValueSubmit);
            break;
        case "uploadhinhanhcuasanpham": 
            $Image = $_FILES['file'];
            $TenSP = $_POST['TenSP'];
            $ValueSubmit = $_POST['SubmitHinhAnh'];    
            $AdminController = new AdminController();
            $AdminController->UploadHinhAnh($TenSP, $ValueSubmit, $Image);
            break;
        case "ActiveSP": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $Value = $_POST['Value'];
            $ValueUpload = $_POST['Update'];
            $AdminController = new AdminController();
            $AdminController->UploadStatusCuaSanPham($SPCT_Id,$Value, $ValueUpload);
            break;
        case "RemoveSP": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $Value = $_POST['RemoveSP'];
            $AdminController = new AdminController();
            $AdminController->xoaSanPham($SPCT_Id, $Value);
            break;
        case "ChinhSuaSanPham": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $TenSPCT = $_POST['TenSPCT'];
            $DonGia = $_POST['DonGia'];
            $SoLuong = $_POST['SoLuong'];
            $ValueSubmit = $_POST['chinhsua'];
            $AdminController = new AdminController();
            $AdminController->updateThongTinSanPham($SPCT_Id, $TenSPCT, $SoLuong, $DonGia,$ValueSubmit);
            break;
        case "Dell": 
            include_once './View/Dell/Laptop-Dell/laptop-dell.php';
            break;
        case "Asus": 
            include_once './View/Asus/Laptop-Asus/laptop-asus.php';
            break;
        case "Lenovo": 
            include_once './View/Lenovo/Laptop-Lenovo/laptop-lenovo.php';
            break;
        case "Macbook": 
            include_once './View/Macbook/Laptop-Macbook/laptop-macbook.php';
            break;
        case "PC-Asus": 
            include_once './View/Asus/PC-Asus/pc-asus.php';
            break;
        case "PC-Dell": 
            include_once './View/Dell/PC-Dell/pc-dell.php';
        case "PC-Lenovo": 
            include_once './View/Lenovo/PC-Lenovo/pc-lenovo.php';
            break;
        case "PC-Macbook": 
            include_once './View/Macbook/PC-Macbook/pc-macbook.php';
            break;
        case "Ram": 
            include_once './View/LinhKien/Ram/ram.php';
            break;
        case "Rom": 
            include_once './View/LinhKien/Rom/rom.php';
            break;
        case "BoMach": 
            include_once './View/LinhKien/BoMach/bomach.php';
            break;
        case "DeToaNhiet": 
            include_once './View/LinhKien/DeToaNhiet/detoanhiet.php';
            break;
        case "ChiTietSanPham": 
            include_once './View/DetailProduct.php';
            break;
        case "GioHang": 
            include_once './View/MyCart.php';
            break;
        case "AddToCart": 
            $Post = $_POST['ThemVaoGio'];
            $id_sp = $_POST['id_sp'];
            $ten_sp = $_POST['ten_sp'];
            $gia_sp = $_POST['gia'];
            $Quantity = $_POST['quantity_SP'];
            $AddTocart = new BuyProductController();
            $AddTocart->themVaoGioHang($Post, $id_sp, $gia_sp, $ten_sp, $Quantity);
            break;
        case "removeProduct":
            $Post = $_POST['Remove_Item'];
            $ten_sp = $_POST['ten_sp'];
            $RemoveCart = new BuyProductController();
            $RemoveCart->xoaGiohang($Post, $ten_sp);
            break;
        case "Purchase_UI":
            $_SESSION['Delivery_type'] = $_POST['flexRadioDefault'];
            include_once './View/checkout.php';
            break;
        default: 
            break;
    }
?>