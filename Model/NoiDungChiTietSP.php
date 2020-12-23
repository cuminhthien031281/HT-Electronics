<?php 

    include_once 'ConnectDB.php';
    class NoiDungChiTiet extends Db{
        private $SPCT_Id;
        private $RowCount;
        public function __construct()
        {
            parent::__construct();
        }
        public function getSPCT_Id() {
            return $this->SPCT_Id;
        }
        public function getRowCount() {
            return $this->RowCount;
        }
        public function timSPCTId($TenSanPham) {
            $TimSPCTID = $this->_pdo->prepare("SELECT SPCT_Id FROM sanphamchitietcuahang WHERE TenSPCT = ?");
            $TimSPCTID->bindParam(1, $TenSanPham);
            $TimSPCTID->execute();
            $Value = $TimSPCTID->fetch();
            $this->SPCT_Id = $Value['SPCT_Id'];
            $this->RowCount = $TimSPCTID->rowCount();
            $TimSPCTID->closeCursor();
            return 1;
        }
        public function themVaoBangNoiDungSPCT($SPCT_Id, $Hang, $HeDieuHanh,$Chip, $ManHinh, $Ram) {
            $ThemVaoBangNoiDung = $this->_pdo->prepare("INSERT INTO noidungsanphamchitiet(SPCT_Id, Hang, HeDieuHanh, Chip, ManHinh, Ram) VALUES (?, ?, ?,?,?,?)");
            $ThemVaoBangNoiDung->bindParam(1, $SPCT_Id);
            $ThemVaoBangNoiDung->bindParam(2, $Hang);
            $ThemVaoBangNoiDung->bindParam(3, $HeDieuHanh);
            $ThemVaoBangNoiDung->bindParam(4, $Chip);
            $ThemVaoBangNoiDung->bindParam(5, $ManHinh);
            $ThemVaoBangNoiDung->bindParam(6, $Ram);
            $ThemVaoBangNoiDung->execute();
            $ThemVaoBangNoiDung->closeCursor();
            return 1;
        }
        //Get Action
        public function HienThiNoiDungSPCT($SPCT_Id) {
            $HienThiNoiDungSPCT = $this->_pdo->prepare("SELECT * FROM noidungsanphamchitiet WHERE SPCT_Id = ?");
            $HienThiNoiDungSPCT->bindParam(1, $SPCT_Id);
            $HienThiNoiDungSPCT->execute();
            $StoreValue = $HienThiNoiDungSPCT->fetch();
            $HienThiNoiDungSPCT->closeCursor();
            return $StoreValue;
        }

        public function HienThiHinhAnhSPCT($SPCT_Id) {
            $HienThiHinhAnhSPCT = $this->_pdo->prepare("SELECT Full FROM hinhanhsanphamchitiet WHERE SPCT_Id = ?");
            $HienThiHinhAnhSPCT->bindParam(1, $SPCT_Id);
            $HienThiHinhAnhSPCT->execute();
            $StoreValue = $HienThiHinhAnhSPCT->fetch();
            $HienThiHinhAnhSPCT->closeCursor();
            return $StoreValue;
        }

        public function HienThiTenSPCT($SPCT_Id) {
            $HienThiTenSPCT = $this->_pdo->prepare("SELECT TenSPCT FROM sanphamchitietcuahang WHERE SPCT_Id = ?");
            $HienThiTenSPCT->bindParam(1, $SPCT_Id);
            $HienThiTenSPCT->execute();
            $StoreValue = $HienThiTenSPCT->fetch();
            $HienThiTenSPCT->closeCursor();
            return $StoreValue;
        }

        public function HienThigiaSPCT($SPCT_Id) {
            $HienThiGiaSPCT = $this->_pdo->prepare("SELECT DonGia FROM sanphamchitietcuahang WHERE SPCT_Id = ?");
            $HienThiGiaSPCT->bindParam(1, $SPCT_Id);
            $HienThiGiaSPCT->execute();
            $StoreValue = $HienThiGiaSPCT->fetch();
            $HienThiGiaSPCT->closeCursor();
            return $StoreValue;
        }
    }

?>