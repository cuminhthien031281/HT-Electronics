<?php 
    include_once('ConnectDB.php');
    class Khuyenmai extends Db{
        private $LoaiKhuyenMai;
        private $PhanTramKhuyenMai; 
        public function __construct(){
            parent::__construct();
        }
        public function setLoaiKhuyenMai($LoaiKhuyenMai) {
            $this->LoaiKhuyenMai = $LoaiKhuyenMai;
        }

        public function setPhanTramKhuyenMai($PhanTramKhuyenMai) {
            $this->PhanTramKhuyenMai = $PhanTramKhuyenMai; 
        }

        public function InsertChuongTrinhKhuyenMai() {
            $InsertTableChuongTrinhKhuyenMai = $this->_pdo->prepare("INSERT INTO chuongtrinhkhuyenmai(LoaiKhuyenMai, PhanTramKhuyenMai) VALUES (?, ?)");
            $InsertTableChuongTrinhKhuyenMai->bindParam(1, $this->LoaiKhuyenMai);
            $InsertTableChuongTrinhKhuyenMai->bindParam(2, $this->PhanTramKhuyenMai);
            $InsertTableChuongTrinhKhuyenMai->execute();
            $InsertTableChuongTrinhKhuyenMai->closeCursor();
            return 1;
        }
        public function find_SPCTID_QuaTen($NameSPCT) {}
        public function find_KhuyenMaiID_QuaTen($NameKhuyenMai) {}
        //Tim Kiem SPCT_Id thong qua ham tim id qua ten san pham 
        public function ApDungLoaiKhuyenMaiChoSanPham($SPCT_Id, $KhuyenMai_Id, $NgayBatDau, $NgayKetThuc) {

        }

    }

?>