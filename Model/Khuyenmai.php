<?php 
    include_once('ConnectDB.php');
    class Khuyenmai extends Db{
        private $LoaiKhuyenMai;
        private $PhanTramKhuyenMai; 
        private $RowCount;
        public function __construct(){
            parent::__construct();
        }
        public function getRowCount() {
            return $this->RowCount;
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
        //Tim kiem trong apdung khuyen mai table
        public function find_SPCTID_TrongApDungKhuyenMai($SPCT_Id) {
            $TimKiemSPCTId = $this->_pdo->prepare("SELECT * FROM chuongtrinhkhuyenmai WHERE SPCT_Id = ?");
            $TimKiemSPCTId->bindParam(1, $SPCT_Id);
            $TimKiemSPCTId->execute();
            $this->RowCount = $TimKiemSPCTId->rowCount();
            $TimKiemSPCTId->closeCursor();
        }
        //Danh cho input nhap vao
        public function find_KhuyenMaiID_QuaTen($NameKhuyenMai) {
            $TimKiemKhuyenMaiId = $this->_pdo->prepare("SELECT * FROM chuongtrinhkhuyenmai WHERE LoaiKhuyenMai = ?");
            $TimKiemKhuyenMaiId->bindParam(1, $NameKhuyenMai);
            $TimKiemKhuyenMaiId->execute();
            $StoreValue = $TimKiemKhuyenMaiId->fetch();
            $TimKiemKhuyenMaiId->closeCursor();
            return $StoreValue;
        }
        //Tim Kiem SPCT_Id thong qua ham tim id qua ten san pham 
        public function ApDungLoaiKhuyenMaiChoSanPham($KhuyenMai_Id, $SPCT_Id, $NgayBatDau, $NgayKetThuc) {
            $ApDungKhuyenMaiChoSanPham = $this->_pdo->prepare("INSERT INTO apdungkhuyenmai(KhuyenMai_Id, SPCT_Id, NgayBatDau, NgayKetThuc) VALUES (?, ?, ?, ?)");
            $ApDungKhuyenMaiChoSanPham->bindParam(1, $KhuyenMai_Id);
            $ApDungKhuyenMaiChoSanPham->bindParam(2, $SPCT_Id);
            $ApDungKhuyenMaiChoSanPham->bindParam(3, $NgayBatDau);
            $ApDungKhuyenMaiChoSanPham->bindParam(4, $NgayKetThuc);
            $ApDungKhuyenMaiChoSanPham->execute();
            $ApDungKhuyenMaiChoSanPham->closeCursor();
            return 1;
        }

    }

?>