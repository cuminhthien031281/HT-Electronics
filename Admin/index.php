<?php 

    include_once './Controller/AdminController.php';
    $Act = isset($_GET['Action']) ? $_GET['Action'] : "Home";
    switch($Act) {
        case "Home": 
            include_once 'Home.php';
            break;
        case "Logout": 
            include_once 'Logoutact.php';
            break;
        case "SanPham": 
            include_once 'SanPhamContent.php';
            break;
        case "uploadhinhanhcuasanpham": 
            $Image = $_FILES['file'];
            $TenSP = $_POST['TenSP'];
            $ValueSubmit = $_POST['SubmitHinhAnh'];    
            $AdminController = new AdminController();
            $AdminController->UploadHinhAnh($TenSP, $ValueSubmit, $Image);
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
        case "ActiveSP": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $Value = $_POST['Value'];
            $ValueUpload = $_POST['Update'];
            $AdminController = new AdminController();
            $AdminController->UploadStatusCuaSanPham($SPCT_Id,$Value, $ValueUpload);
            break;
        case "XoaSP": 
            
            break;
        default: 
            break;
    }

?>