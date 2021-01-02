<?php 
    include_once './Model/SPCT.php';
    include_once './Model/QuerySP.php';
    include_once './Model//Khuyenmai.php';
    include_once './Model/NoiDungChiTietSP.php';
    include_once './Model/Session.php';

    class AdminController {
        public function UploadTTSP($TenSPCT, $TenHMTDM, $DonGia, $SoLuong ,$ValueUpload) {
            if(isset($ValueUpload) == "SubmitTTSP") {
                $SPCT = new SPCT($TenSPCT,$DonGia, $SoLuong, $TenHMTDM);
                $SPCT->find_id();
                $SanPhamSession = new Session();
                if($SPCT->upload()) {
                    $SanPhamSession->SetSession("Upload_status", "Success upload");
                    $SanPhamSession->SetSession("Upload_Code","success");
                    header('Location: ./?Action=SanPhamAdmin');
                    exit();
                } else {
                    $SanPhamSession->SetSession("Upload_status", "Failed upload");
                    $SanPhamSession->SetSession("Upload_Code","failed");
                    header('Location: ./?Action=SanPhamAdmin');
                    exit();
                }
            }
        }
        public function UploadHinhAnh($TenSP, $ValueUpload, $File) {
            if(isset($ValueUpload) == "SubmitImageSanPham") {
                $SPCT = new QuerySP();
                $HinhAnHSession = new Session();
                $SPCT->findIdForSPCT($TenSP);
                if($SPCT->uploadImg($File)) {
                    $HinhAnHSession->SetSession("Status_HinhAnh", "Upload Success");
                    $HinhAnHSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=SanPhamAdmin");
                    exit();
                } else {
                    $HinhAnHSession->SetSession("Status_HinhAnh", "Upload Failed");
                    $HinhAnHSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=SanPhamAdmin");
                    exit();
                }
            }
        }
        
        public function UploadStatusCuaSanPham($SPCT_Id, $Value, $ValueUpload) {
            $SPCT = new QuerySP();
            if(isset($ValueUpload) == "UpdateSPCTStt") {
                $StatusSession = new Session();
                if($SPCT->updateStatus($SPCT_Id, $Value)) {
                    $StatusSession->SetSession("Status", "Success");
                    $StatusSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=HienThiSanPham");
                    exit();
                } else {
                    $StatusSession->SetSession("Status", "Failed");
                    $StatusSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=HienThiSanPham");
                    exit();
                }
            }
        }

        public function UploadTTKhuyenMai($LoaiKhuyenMai, $PhanTramKhuyenMai, $ValueUpload) {
            $ChuongTrinhKhuyenMai = new KhuyenMai();
            $ChuongTrinhKhuyenMaiSession = new Session();
            $ChuongTrinhKhuyenMai->setLoaiKhuyenMai($LoaiKhuyenMai);
            $ChuongTrinhKhuyenMai->setPhanTramKhuyenMai($PhanTramKhuyenMai);
            if(isset($ValueUpload)) {
                if($ChuongTrinhKhuyenMai->InsertChuongTrinhKhuyenMai()) {
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status", "Success");
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ThemXoaSuaKhuyenMai");
                    exit();
                } else {
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status", "Failed");
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ThemXoaSuaKhuyenMai");
                    exit();
                }
            }

        }
        public function SetKhuyenMaiChoSanPham($KhuyenMai_Id, $SPCT_Id, $NgayBatDau, $NgayKetThuc, $ValueSubmit) {
            $ChuongTrinhKhuyenMai = new Khuyenmai();
            $ChuongTrinhKhuyenMaiSession = new Session();
            
            if(isset($ValueSubmit)) {
                if($ChuongTrinhKhuyenMai->ApDungLoaiKhuyenMaiChoSanPham($KhuyenMai_Id,$SPCT_Id,$NgayBatDau,$NgayKetThuc)) {
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status", "Success");
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ApDungKM");
                    exit();
                } else {
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status", "Failed");
                    $ChuongTrinhKhuyenMaiSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ApDungKM");
                    exit();
                }
            }
        }
        public function uploadThongTinSP($SPCT_Id, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram, $ValueUpload) {
            $NoiDungChiTiet = new NoiDungChiTiet();
            $NoiDungChiTietSession = new Session();
                if(isset($ValueUpload)) {
                    if($NoiDungChiTiet->themVaoBangNoiDungSPCT($SPCT_Id, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram) == 1) {
                        $NoiDungChiTietSession->SetSession("Status", "Success");
                        $NoiDungChiTietSession->SetSession("Status_Code", "success");
                        header("Location: ./?Action=ThemXoaChinhSuaTTCT");
                        exit();
                    } else {
                        $NoiDungChiTietSession->SetSession("Status", "Failed");
                        $NoiDungChiTietSession->SetSession("Status_Code", "failed");
                        header("Location: ./?Action=ThemXoaChinhSuaTTCT");
                        exit();
                    }
                }
        }

        public function xoaSanPham($SPCT_Id, $ValueSubmit) {
            $XoaSanPham = new QuerySP();
            $XoaSanPhamSession = new Session();
            if(isset($ValueSubmit)) {
                if($XoaSanPham->xoaSanPham($SPCT_Id) == 1) {
                    $XoaSanPhamSession->SetSession("Status", "Success");
                    $XoaSanPhamSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=SanPhamAdmin");
                    exit();
                } else {
                    $XoaSanPhamSession->SetSession("Status", "Failed");
                    $XoaSanPhamSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=SanPhamAdmin");
                    exit();
                }
            }
        }

        public function updateThongTinSanPham($SPCT_Id, $TenSPCT, $SoLuong, $DonGia, $ValueSubmit) {
            $UpdateThongTin = new QuerySP();
            $UpdateThongTinSession = new Session();
            if(isset($ValueSubmit)) {
                if($UpdateThongTin->updateSP($SPCT_Id, $TenSPCT, $DonGia, $SoLuong) == 1) {
                    $UpdateThongTinSession->SetSession("Status", "Success");
                    $UpdateThongTinSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=SanPhamAdmin");
                    exit();
                } else {
                    $UpdateThongTinSession->SetSession("Status", "Failed");
                    $UpdateThongTinSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=SanPhamAdmin");
                    exit();
                }
            }
        }
        
        public function themNoiDungSP($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4, $ValueSubmit) {
            $ThemNoiDungSP = new NoiDungChiTiet();
            $ThemNoiDungSp = new Session();
            if(isset($ValueSubmit)) {
                if($ThemNoiDungSP->themNoiDungTheoID($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4) == 1) {
                    $ThemNoiDungSp->SetSession("Status", "Success");
                    $ThemNoiDungSp->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ThemXoaChinhSuaND");
                    exit();
                } else {
                    $ThemNoiDungSp->SetSession("Status", "Failed");
                    $ThemNoiDungSp->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ThemXoaChinhSuaND");
                    exit();
                }
            }
        }

        public function xoaNoiDungSP($SPCT_Id, $ValueSubmit) {
            $XoaNoiDungSP = new NoiDungChiTiet();
            $XoaNoiDungSPSession = new Session();
            if(isset($ValueSubmit)) {
                if($XoaNoiDungSP->xoaNoiDungSP($SPCT_Id) == 1) {
                    $XoaNoiDungSPSession->SetSession("Status", "Success");
                    $XoaNoiDungSPSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ThemXoaChinhSuaND");
                    exit();
                } else {
                    $XoaNoiDungSPSession->SetSession("Status", "Failed");
                    $XoaNoiDungSPSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ThemXoaChinhSuaND");
                    exit();
                }
            }
        }

        public function suaNoiDungSP($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4, $ValueSubmit) {
            $SuaNoiDungSP = new NoiDungChiTiet();
            $SuaNoiDungSPSession = new Session();
            if(isset($ValueSubmit)) {
                if($SuaNoiDungSP->suaNoiDungSP($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4)) {
                    $SuaNoiDungSPSession->SetSession("Status", "Success");
                    $SuaNoiDungSPSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ThemXoaChinhSuaND");
                    exit();
                }else {
                    $SuaNoiDungSPSession->SetSession("Status", "Failed");
                    $SuaNoiDungSPSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ThemXoaChinhSuaND");
                    exit();
                }
            }
        }

        public function suaChuongTrinhKM($KhuyenMaiId, $LoaiKhuyenMai, $PhanTramKhuyenMai, $ValueSubmit) {
            $SuaKhuyenMai = new Khuyenmai();
            $SuaKhuyenMaiSession = new Session();
            if(isset($ValueSubmit)) {
                if($SuaKhuyenMai->suaChuongTrinhKhuyenMai($KhuyenMaiId, $LoaiKhuyenMai, $PhanTramKhuyenMai)) {
                    $SuaKhuyenMaiSession->SetSession("Status", "Success");
                    $SuaKhuyenMaiSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ThemXoaSuaKhuyenMai");
                    exit();
                } else {
                    $SuaKhuyenMaiSession->SetSession("Status", "Failed");
                    $SuaKhuyenMaiSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ThemXoaSuaKhuyenMai");
                    exit();
                }
            }
        }

        public function xoaChuongTrinhKM($KhuyenMaiId, $ValueSubmit) {
            $XoaKhuyenMai = new Khuyenmai();
            $XoaKhuyenMaiSession = new Session();
            if(isset($ValueSubmit)) {
                if($XoaKhuyenMai->xoaChuongTrinhKhuyenMai($KhuyenMaiId)) {
                    $XoaKhuyenMaiSession->SetSession("Status", "Success");
                    $XoaKhuyenMaiSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ThemXoaSuaKhuyenMai");
                    exit();
                } else {
                    $XoaKhuyenMaiSession->SetSession("Status", "Failed");
                    $XoaKhuyenMaiSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ThemXoaSuaKhuyenMai");
                    exit();
                }
            }
        }

        public function tatCtrinhKM($SPCT_Id, $Status, $ValueSubmit) {
            $TatCtrinhKM = new Khuyenmai();
            $TatCtrinhKMSession = new Session();
            if(isset($ValueSubmit)) {
                if($TatCtrinhKM->tatCtrinhKM($SPCT_Id, $Status)) {
                    $TatCtrinhKMSession->SetSession("Status", "Success");
                    $TatCtrinhKMSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ApDungKM");
                    exit();
                }else {
                    $TatCtrinhKMSession->SetSession("Status", "Failed");
                    $TatCtrinhKMSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ApDungKM");
                    exit();
                }
            }
        }

        public function batCtrinhKM($SPCT_Id, $Status, $ValueSubmit) {
            $batCtrinhKM = new Khuyenmai();
            $batCtrinhKMSession = new Session();
            if(isset($ValueSubmit)) {
                if($batCtrinhKM->batCtrinhKM($SPCT_Id, $Status)) {
                    $batCtrinhKMSession->SetSession("Status", "Success");
                    $batCtrinhKMSession->SetSession("Status_Code", "success");
                    header("Location: ./?Action=ApDungKM");
                    exit();
                }else {
                    $batCtrinhKMSession->SetSession("Status", "Failed");
                    $batCtrinhKMSession->SetSession("Status_Code", "failed");
                    header("Location: ./?Action=ApDungKM");
                    exit();
                }
            }
        }
    }

?>