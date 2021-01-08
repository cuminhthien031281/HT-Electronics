<?php 
    require_once 'ConnectDb.php';
    class Admin extends Db {
        public function __construct()
        {
            parent::__construct();
        }

        public function DuyetVaHuyDon($DiaChi_Id, $Value){
            $DuyetDon = $this->_pdo->prepare("UPDATE diachigiaohang SET status_don = ? WHERE DiaChi_Id = ?");
            $DuyetDon->bindParam(1, $Value);
            $DuyetDon->bindParam(2, $DiaChi_Id);
            $DuyetDon->execute();
            $DuyetDon->closeCursor();
            return $DuyetDon;
        }

        public function hienThiDonTrenHome($Id) {
            $hienThiDonTrenHome = $this->_pdo->prepare("SELECT COUNT(*) FROM diachigiaohang WHERE status_don = ?");
            $hienThiDonTrenHome->bindParam(1, $Id);
            $hienThiDonTrenHome->execute();
            $StoreValue = $hienThiDonTrenHome->fetch();
            $hienThiDonTrenHome->closeCursor();
            return $StoreValue;
        }

        public function hienThiSoTienKiemDuoc() {
            $hienThiSoTienKiemDuoc = $this->_pdo->prepare("SELECT SUM(ThanhTien) FROM diachigiaohang WHERE status_don = 1");
            $hienThiSoTienKiemDuoc->execute();
            $StoreValue = $hienThiSoTienKiemDuoc->fetch();
            $hienThiSoTienKiemDuoc->closeCursor();
            return $StoreValue;
        }

        public function hienThiTenNguoiDungDaDuyetDon() {
            $hienThiTenNguoiDungDaDuyetDon = $this->_pdo->prepare("SELECT UserName FROM diachigiaohang WHERE status_don = 1");
            $hienThiTenNguoiDungDaDuyetDon->execute();
            $StoreValue = $hienThiTenNguoiDungDaDuyetDon->fetch();
            $hienThiTenNguoiDungDaDuyetDon->closeCursor();
            return $StoreValue;
        }

    }
?>