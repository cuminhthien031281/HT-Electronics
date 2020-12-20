<?php 

    include_once 'ConnectDB.php';
    class QuerySP extends Db{
        private $QuerySanPhamChiTiet;
        public function getQuerySanPhamChiTiet() {
            return $this->QuerySanPhamChiTiet;
        }

        public function queryTableSPCT() {
            $QueryTableSPCT = $this->_pdo->prepare("SELECT * FROM sanphamchitietcuahang");
            $QueryTableSPCT->execute();
            $this->QuerySanPhamChiTiet = $QueryTableSPCT->fetchAll();
            $QueryTableSPCT->closeCursor();
        }
    }


?>