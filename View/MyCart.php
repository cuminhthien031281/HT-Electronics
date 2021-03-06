<?php include_once 'Head.php'?>
<header class="header" id="header"> <!-- Header.php -->
        <div class="header__logo-box">
            <img src="Public/img/new.png" alt="Logo" class="header__logo">
        </div>
        <ul class="header-content u-center-text">
            <li class="header-content__group"><a href="?Action=Home" class="header-content__link header-content__link--home">Trang chủ</a></li>
            <li class="header-content__group"><a href="#" class="header-content__link">Sản phẩm</a></li>
            <?php 
                if(isset($_SESSION['UserName'])) {
            ?>
            
                    <li class="header-content__group header-content__group-login">
                    <!--Style Username-logout-->
                    <?php 
                    include_once './Model/KhachHang.php';
                    $ImgCheckObj = new KhachHang();
                    if($ImgCheckObj->CheckImg($_SESSION['KhachHang_Id']) == true) {
                        echo '<img class="header-content__link--img header-content__group-user" src="Public/ImageUser/profile'. $ImgCheckObj->getUsrID() . $ImgCheckObj->getImgName() . '.' . $ImgCheckObj->getImgType().'">';
                    } else {
                        echo '<img class="header-content__link--img header-content__group-user" src="Public/ImageUser/profile'. $ImgCheckObj->getImgName() .'.'. $ImgCheckObj->getImgType().'">';
                    }
                    ?>
                        <?php echo '<h1 class="header-content__link--username header-content__group-user">'.$_SESSION['UserName'].'</h1>'; ?>
                    </li>
                    <a href="?Action=Logout">Logout</a>
                    <!--Style Username-logout-->
            
            <?php 
                } else {
            ?>
                    <li class="header-content__group"><a href="?Action=Login" class="header-content__link header-content__link--login">Đăng nhập</a></li>
            <?php 
                }
            ?>
            <li class="header-content__group">
                <div class="header-search">
                    <div class="header-search__item">
                        <input type="search" class="header-search__item--input" placeholder="Tìm kiếm ...">
                    </div>
                    <div class="header-search__item">
                        <i class="fas fa-search  header-search__item--icon"></i>
                    </div>
            </li>
        </ul>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>GIỎ HÀNG</h1>
        </div>
    </div>

    <div class="col-lg-9">
            <table class="table">
                <thead class="thead-dark text-center">
                    <tr>
                    <th scope="col" class="cart-th">STT</th>
                    <th scope="col" class="cart-th">Tên sản phẩm</th>
                    <th scope="col" class="cart-th">Giá sản phẩm</th>
                    <th scope="col" class="cart-th" style="width: 15%">Số lượng</th>
                    <th scope="col" class="cart-th">Xóa</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                        $total = 0;
                        if(isset($_SESSION['cart'])) {
                            foreach($_SESSION['cart'] as $key => $value)
                            {
                                $total += $value['gia'] * $value['quantity_SP'];
                                $sr = $key+1;
                                echo "
                                <tr>
                                    <td>$sr</td>
                                    <td>$value[ten_sp]</td>
                                    <td>$value[gia]</td>
                                    <td>$value[quantity_SP]</td>
                                    <td>
                                        <form action='?Action=removeProduct' method='post'>
                                            <button name='Remove_Item' class='btn btn-sm btn-outline-danger cart-th'>Xóa</button>
                                            <input type='hidden' name= 'ten_sp' value='$value[ten_sp]'>
                                        </form>
                                    
                                    </td>
                                </tr>
                                ";
                            
                            }
                        }
                    ?>
                    

                    
                </tbody>
            </table>
    </div>

    <div class="col-lg-3">
    <?php if($total != 0) { ?>
        <div class="border bg-light rounded p-4">
            <h4>Phương thức thanh toán: </h4>
            <h5 class="text-right">
            <?php
            
            
                if($total == 0) {
                    echo "Chua co san pham";
                }
            
            
            ?></h5>
            <br>
                        <form action="?Action=Purchase_UI" method="post">
                            <div class="form-check">
                                <input type="radio" class="form-check-input cart-input" name="flexRadioDefault" value="CashOnDelivery" id="flexRadioDefault2" checked>
                                <label for="flexRadioDefault2" class="form-check-label cart-label">
                                Thanh toán khi giao hàng
                                </label>

                                <input style="margin-Top: 1rem;" type="radio" class="form-check-input cart-input" name="flexRadioDefault" value="CashOnCard" id="flexRadioDefault2" checked>
                                <label style="margin-Top: 1rem;" for="flexRadioDefault2" class="form-check-label cart-label">
                                Thanh toán bằng thẻ tín dụng
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-block" type="submit" name="MakePurchase" value="purchase" style="font-size: 1.5rem;">Tiến hành đặt hàng</button>
                        </form>
            <?php } else {?>
                    <div class="cart-note">
                    <img src="./Public/img/error-cart1.png" alt="" class="cart-note__img">
                    <h3 class="cart-note__on">Không có sản phẩm nào trong giỏ hàng !</h3>
                    <a href="?Action=Home"class="cart-note__text"><i class="far fa-share-square"></i>Tiếp tục mua hàng</a>
                    </div>
            <?php } ?>
        </div>
        
    </div>
    
</div>
    
<?php include_once 'EndHead.php';?>