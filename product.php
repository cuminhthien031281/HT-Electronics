<?php include_once 'View/Head.php';?>
<?php include_once 'View/Header.php';?>

<div id="content">
        <a onClick="openSlideMenu()">
            <i class="fas fa-bars detail-openMenu"></i>
        </a>
</div>
<div class="category-product" id="menu">
    <a class="category-product__close" onClick="closeSlideMenu()">
        <i class="fas fa-times"></i>
    </a>
    <h2 class="category-product__name">San Pham</h2>
    <div class="category-product-title">
        <?php
        include_once './Model/DMSP.php';
        $DMSP_Obj = new DMSP();
        $DMSP = $DMSP_Obj->GetDMSP();
        $HMTDM = $DMSP_Obj->GetHMTDM();
        ?>
        <?php
        foreach ($DMSP as $DMSPs) {
        ?>
            <h3 class='font-p adt-left-title'><?php echo $DMSPs['DMSP']; ?></h1>
                <ul class="adt-left-title">
                    <?php
                    //Loop into child of DMSP
                    foreach ($HMTDM as $HMTDMs) {
                        if ($HMTDMs['DMSP_Id'] == $DMSPs['DMSP_Id']) {
                    ?>
                            <li class="adt-left__group"><a href="?Action=<?php echo $HMTDMs['TenHMTDM']; ?>" class="adt-left__link"><?php echo $HMTDMs['TenHMTDM']; ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            <?php
        }
            ?>
    </div>
</div>
<section class="product">
    <div class="row ">
        <div class="col-2">
            <div class="product-option">
                <div class="product-option__price">
                    <h4 class="product-option__price--name">Chọn mức giá</h4>
                    <ul class="product-option-list">
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="#">Dưới 15 triệu</a></li>
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="#">15 - 20 triệu</a></li>
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="#">20 - 25 triệu</a></li>  
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="#">25 - 30 triệu</a></li>  
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="#">Trên 30 triệu</a></li>  
                    </ul>
                </div>
                <div class="product-option__start">
                    <h4 class="product-option__price--name">Chọn mức đánh giá </h4>
                    <ul class="product-option-list">
                        <li class="product-option-group"><a href="#" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                        </a></li>
                        <li class="product-option-group"><a href="#" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                        </a></li>
                        <li class="product-option-group"><a href="#" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                        </a></li>  
                        <li class="product-option-group"><a href="#" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                        </a></li>  
                    </ul>
                </div>
            </div>
        </div>
    <!-----1----->
        <div class="col-10">
        <div class="product-name">
                <h2 class="product-name__text--1">Loptop, Pc-gaming, Linh kiện điện tử</h2>
                <span class="product-name__text--2">Mua máy tính xách tay, máy tính để bàn, màn hình, máy tính bảng, PC chơi game, ổ cứng và bộ lưu trữ, phụ kiện, v.v.</span>
        </div>
            <div class="row product__row">
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div>
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div>     
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div> 
            </div>
            <!-----1----->
            <div class="row product__row">
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div>
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div>     
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div> 
            </div>
            <!-----1----->
            <div class="row product__row">
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div>
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div>     
                <!-----1----->
                <div class="col-4">
                    <div class="box__img">
                        <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block h-75 w-75" alt="new-product-1"></a>
                    </div>
                    <div class="box__detail">
                        <div class="box__detail--name">
                            <a href="#" class="font-default">Dell XPS 13 7390 13.3 inch 4K UHD</a>
                        </div>
                        <div class="box__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="box__detail--price">12.000.000₫</div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<script src="./Public/js/slide-left.js"></script>
<?php include_once 'View/Footer.php';?>
<?php include_once 'View/EndHead.php';?>