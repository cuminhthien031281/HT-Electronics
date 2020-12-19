<?php 
    session_start();    
    include_once './Controller/LoginController.php';
    include_once './Controller/RegisterController.php';
    $actView = isset($_GET['Action']) ? $_GET['Action'] : "Home";
    switch ($actView) {
        case "Home": 
            require_once './View/Home.php';
            break;
        case "Login":
            require_once './View/Login.php';
            break;
        case "Register": 
            require_once './View/Register.php';
            break;
        case "logUserIn": 
            $UserNameInputLogin = $_POST['TenDangNhap'];
            $PasswordInputLogin = $_POST['MatKhau'];
            $SubmitFormLogin  = $_POST['SubmitLogin'];
            $LoginController = new LoginController();
            $LoginController->Login($UserNameInputLogin, $PasswordInputLogin, $SubmitFormLogin);
            break;
        case "regUserIn": 
            $UserNameInputRegister = $_POST['TenDangKy'];
            $EmailInputRegister = $_POST['Email'];
            $PasswordInputRegister = $_POST['MatKhauDangKy'];
            $SubmitFormRegister = $_POST['Register'];
            $RegisterController = new RegisterController();
            $RegisterController->RegisterUser($UserNameInputRegister, $EmailInputRegister, $PasswordInputRegister, $SubmitFormRegister);
            break;
        case "Logout": 
            include_once './Controller/Logout.php';
            break;
        case "Admin": 
            
            break;
        case "Dell": 
            include_once './View/Dell/Laptop-Dell/laptop-dell.php';
        default: 
            break;
    }
?>