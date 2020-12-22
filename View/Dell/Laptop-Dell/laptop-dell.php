<?php include_once "./View/Head.php";?>
<?php include_once "./View/Header.php";?>
<?php include_once './Model/QuerySP.php';?>
    <section class="laptop-dell">
        <div class="container">
            <h3 class="">Dell</h3>
            <?php 
                
                    $CheckTenHMTDM = $_GET['Action'];
                    
                    $QuerySP = new QuerySP();
                    $QuerySP->findIDForHMTDM($CheckTenHMTDM);
                    $QuerySP->DisplayProductForID();
                    $SanPham = $QuerySP->getDisplayProduct();
            ?>
            <?php foreach($SanPham as $SanPhams) {?>
                        <?php 
                                $QuerySP->queryTableImageSPCTTID($SanPhams['SPCT_Id']);  
                                $HinhAnhSanPham = $QuerySP->getImageSource();
                        ?>
                                <div class="box-product">
                                        <div class="box-product__img">
                                            <img src="Public/ImageSPCT/<?php echo $HinhAnhSanPham['Full'];?>" class="d-block w-100" alt="dell-1">
                                        </div>
                                    <div class="box-product__detail">
                                        <a href="#" class="box-product__detail--name"><?php echo $SanPhams['TenSPCT'];?></a>
                                        <div class="box-product__detail--start">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <del class="font-box-product-old"><?php echo $SanPhams['DonGia'];?>₫</del>
                                        <div class="box-product__detail--price-new">90000₫</div>
                                    </div>
                                </div>
            <?php } ?>
        </div>
    </section>



<?php include_once "./View/Footer.php";?>
<?php include_once "./View/EndHead.php"; ?>