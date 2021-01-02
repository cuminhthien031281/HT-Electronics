<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/QuerySP.php';
    include_once './Model/DMSP.php';

    $SPCT = new QuerySP();
    $DMSP = new DMSP();
    $HMTDM = $DMSP->GetHMTDM();
    $SPCT->queryTableSPCT();
    $DisplaySPCT = $SPCT->getQuerySanPhamChiTiet();
    $SPCT->queryTableImageSPCT();
    $ImageSPCT = $SPCT->getQueryTableHinhAnhSPCT();
    $ArrayImage = array();
    foreach ($ImageSPCT as $ImageSPCTs) {
        $ArrayImage[] = $ImageSPCTs['SPCT_Id'];
    }
    //$result[] = array_diff_assoc($DisplaySPCT, $ImageSPCT);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
        
        foreach($DisplaySPCT as $DisplaySPCTs) {
            //echo "<pre>";
            //print_r($DisplaySPCTs);
            //echo "</pre>";
            $arr[] = $DisplaySPCTs;
        }
        foreach($ImageSPCT as $ImageSPCTs => $value) {
            $arr1[] = $value;
        }
        
        print_r($arr1);
        
        
    ?>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include('./include/Scripts_Upload_Img.php');
include('./include/Scripts_Uoload_SP.php');
include('./include/Scripts_Update_Stt.php');
include_once './Admin/EndHead.php';

?>