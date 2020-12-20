<?php 
    include_once './Model/SPCT.php';
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
        public function UploadHinhAnh($SPCT_Id, $ValueUpload) {
            if(isset($ValueUpload) == "") {
                
            }
        }   
    }

?>