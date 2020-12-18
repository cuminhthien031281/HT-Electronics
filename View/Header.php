<header class="header" id="header"> <!-- Header.php -->
        <div class="header__logo-box">
            <img src="Public/img/new.png" alt="Logo" class="header__logo">
        </div>
        <ul class="header-content u-center-text">
            <li class="header-content__group"><a href="index.html" class="header-content__link header-content__link--home">Trang chủ</a></li>
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
                        echo '<img class="header-content__link--img header-content__group-user" src="Admin/ImageUser/profile'. $ImgCheckObj->getUsrID() . $ImgCheckObj->getImgName() . '.' . $ImgCheckObj->getImgType().'">';
                    } else {
                        echo '<img class="header-content__link--img header-content__group-user" src="Admin/ImageUser/profile'. $ImgCheckObj->getImgName() .'.'. $ImgCheckObj->getImgType().'">';
                    }
            ?>
                        <?php echo '<h1 class="header-content__link--username header-content__group-user">'.$_SESSION['UserName'].'</h1>'; ?>
                    </li>
                    
                    <li class="header-content__group header-content-cart">
                        <a href="#" class="header-content__link"><i class="fas fa-shopping-cart header-content__link--cart"></i>giỏ hàng</a>
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