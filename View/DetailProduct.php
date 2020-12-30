<?php include_once 'View/Head.php'; ?>
<?php include_once 'View/Header.php'; ?>
<?php $SPCT_Id = $_GET['Id'];
    include_once './Model/NoiDungChiTietSP.php';
    $NoiDungSP = new NoiDungChiTiet();
?>
<section class="detail-product">
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
    <div class="detail">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="detail__img">
                        <div class="detail__img-big">
                            <?php $Image = $NoiDungSP->HienThiHinhAnhSPCT($SPCT_Id);
                            ?>
                            <img src="/HT-Electronics/Public/ImageSPCT/<?php echo $Image['Full'];?>" class="d-block w-100" alt="" id="ProductImg">
                        </div>
                        <div class="detail__img-small">
                            <ul class="detail-list">
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-4.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-3.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-2.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-1.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="detail-name-evaluate">
                        <?php $TenSPCT = $NoiDungSP->HienThiTenSPCT($SPCT_Id);
                            
                        ?>
                        <span class="detail-name-evaluate__name">
                            <?php echo $TenSPCT['TenSPCT'];?>
                        </span>
                        <div class="box-product__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="detail-parameter">
                        <div class="detail-parameter-left">
                            <ul class="detail-parameter-left__list">
                                <li class="detail-parameter-left__group">Hãng</li>
                                <li class="detail-parameter-left__group">Hệ điều hành</li>
                                <li class="detail-parameter-left__group">Chip</li>
                                <li class="detail-parameter-left__group">Màn hình</li>
                                <li class="detail-parameter-left__group">Ram</li>
                            </ul>
                        </div>
                        <div class="detail-parameter-right">
                            <?php $NoiDungSPCT = $NoiDungSP->HienThiNoiDungSPCT($SPCT_Id);
                            ?>
                            <ul class="detail-parameter-right__list">
                                <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['Hang'];?></li>
                                <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['HeDieuHanh'];?></li>
                                <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['Chip'];?></li>
                                <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['ManHinh'];?></li>
                                <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['Ram'];?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="detail-price">
                        <?php $GiaSPCT = $NoiDungSP->HienThigiaSPCT($SPCT_Id)?>
                        <del class="detail-price__old">13,540,00đ</del>
                        <div class="detail-price__promotional" id="price"><?php echo $GiaSPCT['DonGia'];?></div>
                    </div>
                    <div class="detail-buy">
                        <label class="detail-buy__amount">Số lượng:</label>
                        <!-- Get quantity -->
                        <form action="" method="GET">
                            <button class="minus-btn disabled">-</button>
                            <input type="text" value="1" id="quantity">
                            <button class="plus-btn">+</button>
                        </form>
                        
                    </div>
                    <div class="detail-order">
                        <button type="submit" class="form__btn">Đặt hàng</button>
                        <form action="?Action=AddToCart" method="post">
                            
                            <input type="number" name="quantity_SP" min="1" max="10" id="quantity">
                            
                            <input type="hidden" name="id_sp" value="<?php echo $SPCT_Id;?>">
                            <input type="hidden" name="ten_sp" value="<?php echo $TenSPCT['TenSPCT'];?>">
                            <input type="hidden" name="gia" value="<?php echo $GiaSPCT['DonGia'];?>">
                            <button type="submit" name="ThemVaoGio" value="ThemSanPham" class="form__btn form__btn--add-to-card">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                    <div class="description">
                        <h3 class="description__name">Mô tả sản phẩm</h3>
                        <ul class="description-product">
                            <li class="description-product__list">Bộ xử lý Intel Core i5-9300H thế hệ thứ 9 mạnh mẽ @ 2,40GHz (4 lõi, 8M bộ nhớ đệm, tối đa 4,10 GHz), với nền tảng điện áp cực thấp và xử lý lõi tứ, tám hướng, cung cấp năng lượng hiệu quả cao tối đa để đi. Công nghệ Intel Turbo
                                Boost cung cấp thêm năng lượng động khi bạn cần.</li>
                            <li class="description-product__list">15,6 inch FHD (1920 x 1080) Đèn nền LED chống lóa không cảm ứng Màn hình WVA Viền hẹp có màu sắc và độ rõ nét ấn tượng. Đồ họa NVIDIA GeForce GTX 1660 Ti được hỗ trợ bởi bộ nhớ video 6GB GDDR6 chuyên dụng cho GPU tiên tiến,
                                cực nhanh để cung cấp năng lượng cho các trò chơi của bạn.</li>
                            <li class="description-product__list">Bộ nhớ DDR4 8GB 2666MHz cho đa nhiệm toàn năng; 512GB M.2 NVMe PCIe SSD cho hiệu suất nhanh hơn và độ tin cậy tốt hơn; Ổ cứng SSD Pci-e rất phù hợp cho các ứng dụng chơi game lớn, nhiều máy chủ, sao lưu hàng ngày, v.v.</li>
                            <li class="description-product__list">802.11 Wireless-AC + Bluetooth, 1 x USB 3.0, 2 x USB 2.0, 1 x HDMI</li>
                            <li class="description-product__list">Windows 10 Home 64-bit; backlit keyboard for easy typing in dim or dark locations.Windows 10 Home 64-bit; bàn phím có đèn nền để dễ dàng đánh máy ở những vị trí mờ hoặc tối.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-product-similar">
        <div class="detail-product-similar__name">
            <h3 class="detail-product-similar__name--text">Sản phẩm tương tự</h3>
        </div>
        <div id="carouselExampleControls" class="carousel slide" style="padding: 2rem 3rem; box-shadow: none;" data-wrap="false" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="box">
                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                        <div class="col-lg-2">
                            <div class="box">


                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                        <div class="col-lg-2">
                            <div class="box">


                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                        <div class="col-lg-2">
                            <div class="box">


                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                        <div class="col-lg-2">
                            <div class="box">


                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                        <div class="col-lg-2">
                            <div class="box">


                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="box">
                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                        <div class="col-lg-2">
                            <div class="box">


                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
                        <div class="col-lg-2">
                            <div class="box">


                                <div class="box__img">
                                    <a href="#"><img src="/HT-Electronics/Public/img/ram.jpg" class="d-block w-100" alt="new-product-1"></a>
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
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" style="max-width: 0rem;" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" style="margin-left: 3rem; background-color: black; padding: 2rem 1.5rem;" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" style="max-width: 0rem;" role="button" data-slide="next">
                <span class="carousel-control-next-icon" style="margin-left: -3rem;background-color: black; padding: 2rem 1.5rem;" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="container">
        <div class="opinion">
            <div class="opinion-rating">
                <h3>Đánh giá sản phẩm</h3>
                <div class="star-widget u-margin-bottom-small">
                    <input type="radio" name="rate" id="rate-5">
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-4">
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-3">
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-2">
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-1">
                    <label for="rate-1" class="fas fa-star"></label>
                </div>
            </div>
            <div class="opinion-comment">
                <h3 class="u-margin-bottom-small">Bình luận</h3>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập tên...">
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea type="text" class="form-control" style="height: 10rem;" placeholder="Nhập bình luận..."></textarea>
                    </div>
                    <button type="submit" class="form__btn">Bình luận</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="./Public/js/slide-left.js"></script>
<?php include_once 'View/Footer.php'; ?>
<?php include_once 'View/EndHead.php'; ?>