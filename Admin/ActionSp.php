<?php 
    if(isset($_GET['Actionsp'])) {
        $ActSp = $_GET['Actionsp'];
        switch($ActSp) {
            case "uploadSPCT": 
                include_once 'UploadInterface.php';
                break;
            default: 
                break;
        }
    }
?>