<?php 
    include_once './Controller/AdminController.php';
    if(isset($_GET['Actionsp'])) {
        $ActSp = $_GET['Actionsp'];
        switch($ActSp) {
            case "uploadSPCT": 
                include_once 'UploadInterface.php';
                break;
            case "uploadthongtinsanpham": 
                $TenSPCT = $_POST['TenSPCT'];
                $TenHMTDM = $_POST['TenHMTDM'];
                $DonGia = $_POST['DonGia'];
                $SoLuong = $_POST['SoLuong'];
                $ValueSubmit = $_POST['SubmitTTSP'];
                $AdminController = new AdminController();
                $AdminController->UploadTTSP($TenSPCT, $TenHMTDM, $DonGia, $SoLuong, $ValueSubmit);
                break;
            case "xemsanpham": 
                include_once 'SanPhamInterface.php';
                break;
            case "uploadHinhAnhSP":
                //$SPCT_Id = $_GET['SPCT_Id'];
                include_once 'UploadHinhAnhSP.php';
                break;
            case "uploadhinhanhcuasanpham": 
                $SPCT_Id = $_GET['SPCT_Id'];
                break;
            default: 
                break;
        }
    }
?>