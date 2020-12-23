<?php 
    include_once './Model/SPCT.php';
    include_once './Model/QuerySP.php';
    include_once './Model//Khuyenmai.php';
    include_once './Model/NoiDungChiTietSP.php';
    class AdminController {
        public function UploadTTSP($TenSPCT, $TenHMTDM, $DonGia, $SoLuong ,$ValueUpload) {
            if(isset($ValueUpload) == "SubmitTTSP") {
                $SPCT = new SPCT($TenSPCT,$DonGia, $SoLuong, $TenHMTDM);
                $SPCT->find_id();
                if($SPCT->upload()) {
                    header('Location: ./?Action=Admin&UploadTT=success');
                    exit();
                } else {
                    header('Location: ./?Action=Admin&UploadTT=failed');
                    exit();
                }
            }
        }
        public function UploadHinhAnh($TenSP, $ValueUpload, $File) {
            if(isset($ValueUpload) == "SubmitImageSanPham") {
                $SPCT = new QuerySP();
                $SPCT->findIdForSPCT($TenSP);
                if($SPCT->uploadImg($File)) {
                    header("Location: ./?Action=Admin&UploadTT=success");
                    exit();
                } else {
                    header("Location: ./?Action=Admin&UploadTT=failed");
                    exit();
                }
            }
        }
        
        public function UploadStatusCuaSanPham($SPCT_Id, $Value, $ValueUpload) {
            $SPCT = new QuerySP();
            if(isset($ValueUpload) == "UpdateSPCTStt") {
                if($SPCT->updateStatus($SPCT_Id, $Value)) {
                    header("Location: ./?Action=Admin&UploadTT=success");
                    exit();
                } else {
                    header("Location: ./?Action=Admin&UploadTT=failed");
                    exit();
                }
            }
        }

        public function UploadTTKhuyenMai($LoaiKhuyenMai, $PhanTramKhuyenMai, $ValueUpload) {
            $ChuongTrinhKhuyenMai = new KhuyenMai();
            $ChuongTrinhKhuyenMai->setLoaiKhuyenMai($LoaiKhuyenMai);
            $ChuongTrinhKhuyenMai->setPhanTramKhuyenMai($PhanTramKhuyenMai);
            if(isset($ValueUpload) == "SubmitTTKM") {
                if($ChuongTrinhKhuyenMai->InsertChuongTrinhKhuyenMai()) {
                    header("Location: ./?Action=Admin&UploadTT=success");
                    exit();
                } else {
                    header("Location: ./?Action=Admin&UploadTT=failed");
                    exit();
                }
            }

        }
        public function SetKhuyenMaiChoSanPham($LoaiKhuyenMai, $SPCT_Id, $NgayBatDau, $NgayKetThuc, $ValueSubmit) {
            $ChuongTrinhKhuyenMai = new Khuyenmai();
            $KhuyenMaiId = $ChuongTrinhKhuyenMai->find_KhuyenMaiID_QuaTen($LoaiKhuyenMai);
            if(isset($ValueSubmit) == "SubmitKM") {
                if($ChuongTrinhKhuyenMai->ApDungLoaiKhuyenMaiChoSanPham($KhuyenMaiId['KhuyenMai_Id'],$SPCT_Id,$NgayBatDau,$NgayKetThuc)) {
                    header("Location: ./?Action=Admin&UploadTT=success");
                    exit();
                } else {
                    header("Location: ./?Action=Admin&UploadTT=failed");
                    exit();
                }
            }
        }
        public function uploadThongTinSP($TenSP, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram, $ValueUpload) {
            $NoiDungChiTiet = new NoiDungChiTiet();
            $NoiDungChiTiet->timSPCTId($TenSP);
            $SPCT_Id = $NoiDungChiTiet->getSPCT_Id();
            $RowCount = $NoiDungChiTiet->getRowCount();
            if($RowCount > 0) {
                if(isset($ValueUpload) == "SubmitThongSoKiThuat") {
                    if($NoiDungChiTiet->themVaoBangNoiDungSPCT($SPCT_Id, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram)) {
                        header("Location: ./?Action=Admin&UploadTT=success");
                        exit();
                    } else {
                        header("Location: ./?Action=Admin&UploadTT=failed");
                        exit();
                    }
                }
            }
        }
    }

?>