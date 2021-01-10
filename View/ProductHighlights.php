<?php 

    include_once '';

?>



<section class="product-highlights"> <!-- ProductHighlights.php-->
        <div class="container">
            <div class="product-new-name">
                <h3 class="margin-bottom-small product-new-name__text">Sản phẩm nổi bật</h3>
            </div>
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="box">

                        <div class="box__add-to-card">
                            <form action="?Action=AddToCart" method="post">
                                
                                <input type="number" name="quantity_SP" min="1" max="10" id="quantity">
                                
                                <input type="hidden" name="id_sp" value="<?php echo $SPCT_Id;?>">
                                <input type="hidden" name="ten_sp" value="<?php echo $TenSPCT['TenSPCT'];?>">
                                <input type="hidden" name="gia" value="<?php if(!empty($CheckKhuyenMai)) {
                                                                                echo $DonGiaKhuyenMai;
                                                                            } else {
                                                                                echo $GiaSPCT['DonGia'];
                                                                            }?>">
                                <button type="submit" name="ThemVaoGio" value="ThemSanPham" class="form__btn form__btn--add-to-card">Thêm vào giỏ hàng</button>
                            </form>
                            
                        </div>
                        <div class="box__img">
                            <a href="#"><img src="Public/img/new-product-1.jpg" class="d-block w-100" alt="new-product-1"></a>
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