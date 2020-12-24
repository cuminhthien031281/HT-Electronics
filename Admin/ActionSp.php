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
                $Image = $_FILES['file'];
                $TenSP = $_POST['TenSP'];
                $ValueSubmit = $_POST['SubmitHinhAnh'];    
                $AdminController = new AdminController();
                $AdminController->UploadHinhAnh($TenSP, $ValueSubmit, $Image);
                break;
            case "activesp": 
                $SPCT_Id = $_POST['SPCT_Id'];
                $Value = $_POST['Value'];
                $ValueUpload = $_POST['Update'];
                $AdminController = new AdminController();
                $AdminController->UploadStatusCuaSanPham($SPCT_Id,$Value, $ValueUpload);
                break;
            case "uploadkhuyenmai":
                include_once 'UploadKhuyenMai.php';
                break;
            case "UploadTTKM": 
                $LoaiKhuyenMai = $_POST['LoaiKhuyenMai'];
                $PhanTramKhuyenMai = $_POST['PhanTramKhuyenMai'];
                $ValueSubmit = $_POST['ValueSubmit'];
                $AdminController = new AdminController();
                $AdminController->UploadTTKhuyenMai($LoaiKhuyenMai,$PhanTramKhuyenMai,$ValueSubmit);
                break;
            case "apdungchuongtrinhkhuyenmai":
                $LoaiKhuyenMai = $_POST['LoaiKhuyenMai'];
                $SPCT_Id = $_POST['SPCT_Id'];
                $NgayBatDau = $_POST['NgayBatDau'];
                $NgayKetThuc = $_POST['NgayKetThuc'];
                $ValueSubmit = $_POST['SubmitChuongTrinhKM'];
                $AdminController = new AdminController();
                $AdminController->SetKhuyenMaiChoSanPham($LoaiKhuyenMai, $SPCT_Id, $NgayBatDau, $NgayKetThuc,$ValueSubmit);
                break;
            case "uploadthongsokithuat":
                include_once 'UploadThongSoKiThuat.php';
                break;
            case "uploadthongsosp": 
                $TenSanPham = $_POST['TenSanPham'];
                $Hang = $_POST['Hang'];
                $HeDieuHanh = $_POST['HeDieuHanh'];
                $Chip = $_POST['Chip'];
                $ManHinh =$_POST['ManHinh'];
                $Ram = $_POST['Ram'];
                $ValueSubmit = $_POST['SubmitThongSo'];
                $AdminController = new AdminController();
                $AdminController->uploadThongTinSP($TenSanPham, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram, $ValueSubmit);
                break;
            case "test": 
                include_once './View/test.php';
                break;
            default: 
                break;
        }
    }
?>