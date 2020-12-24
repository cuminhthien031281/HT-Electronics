<?php 
include_once './Model/QuerySP.php';
$SPCT = new QuerySP();
$SPCT->queryTableSPCT();
$DisplaySPCT = $SPCT->getQuerySanPhamChiTiet();
$SPCT->queryTableImageSPCT();
$ImageSPCT = $SPCT->getQueryTableHinhAnhSPCT();
$ArrayImage = array();
foreach($ImageSPCT as $ImageSPCTs) {
    $ArrayImage[] = $ImageSPCTs['SPCT_Id'];
}

    foreach($DisplaySPCT as $DisplaySPCTs) {
        if(in_array($DisplaySPCTs['SPCT_Id'], $ArrayImage)) {
           echo "Yes";
            
        } else {
            echo "No data";
        }
    }
    
    
        
    
    
    
    
?>