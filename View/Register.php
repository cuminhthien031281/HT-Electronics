<?php include_once 'Head.php';?>
<?php if(isset($_GET['status'])=="RegFail"){?>
        <script>alert('Register Fail.');</script>
<?php }?>
    <div class="container">
        <div class="logo">
            <a href="#"><img src="Public/img/new.png" alt="Logo" class="logo__form"></a>
        </div>
        <form class="form" id="form" method="POST" action="?Action=regUserIn">
            <h3 class="form__name">Đăng ký</h3>
            <div class="form-group">
                <input type="text" class="form__input" name="TenDangKy" id="username" placeholder="Tên đăng nhập" >
                <label for="name" class="form__label">Tên đăng nhập</label><div id="error"></div>
            </div>
            <div class="form-group">
                <input type="email" class="form__input" name="Email" id="email" placeholder="Email">
                <label for="name" class="form__label">Email</label>
            </div>
            <div class="form-group">
                <input type="password" class="form__input" name="MatKhauDangKy" id="pwd" placeholder="Mật khẩu">
                <label for="name" class="form__label">Mật khẩu</label><div id="error"></div>
            </div>
            <div class="form-group">
                <input type="password" class="form__input" name="" id="pwd2" placeholder="Nhập lại mật khẩu">
                <label for="name" class="form__label">Nhập lại mật khẩu</label><div id="error"></div>
            </div>
            <button type="submit" class="form__btn u-margin-bottom-small" name="Register" Value Value="RegUser">Đăng ký</button>
            <div class="u-margin-bottom-small">
                <p><i>Bạn đã có sẵn tài khoản ? <a href="?Action=Login">Đăng nhập</a></i></p>
            </div>
        </form>
    </div>
<script src="./Public/js/form-validation.js"></script>
  
<?php include_once 'Footer.php';?>
<?php include_once 'EndHead.php';?>