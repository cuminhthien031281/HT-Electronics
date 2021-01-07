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

    }
?>