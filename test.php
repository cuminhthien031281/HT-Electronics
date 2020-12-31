<?php 
            include_once './Model/QuerySP.php';
            $SPCT_Id = $_POST['SPCT_Id'];
            $Value = $_POST['RemoveSP'];
            $querySP = new QuerySP();
            
            if($querySP->xoaSanPham($SPCT_Id) == 1) {
                echo "success";
            } else {
                echo "failed";
            }
            

?>
    
    
        
    
    
    
    
