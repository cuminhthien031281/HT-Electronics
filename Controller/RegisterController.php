<?php 
    include_once './Model/KhachHang.php';
    include_once './Sanitizie/Sanitizie.php';
    class RegisterController {
        public function RegisterUser($UserName, $Email, $Password, $ValueReg) {
            if(isset($ValueReg)) {
                $UserNameAfterClean = clean($UserName);
                $PasswordAfterClean = clean($Password);
                $EmailAfterClean = clean($Email);
                $UserRegisterObj = new KhachHang();
                $UserRegisterObj->SetUsrName($UserNameAfterClean);
                $UserRegisterObj->SetPassword($PasswordAfterClean);
                if($UserRegisterObj->Register($EmailAfterClean)) {
                    header("Location: ./?Action=Login&status=RegSuccess"); 
                } else {
                    header("Location: ./?Action=Register&status=RegFail");
                }
            }
        }
    }

?>