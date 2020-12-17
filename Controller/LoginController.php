<?php 
    include_once './Model/KhachHang.php';
    include_once './Model/Session.php';
    include_once './Sanitizie/Sanitizie.php';
    class LoginController {
        public function Login($UserNameInput, $Password, $ValuePost) {
            if(isset($ValuePost)) {
                //Change this
                $UserNameAfterClean = clean($UserNameInput);
                $PasswordAfterClean = clean($Password);
                //Create khachhang obj
                $KhachHangObj = new KhachHang();
                $KhachHangObj->SetUsrName($UserNameAfterClean);
                $KhachHangObj->SetPassword($PasswordAfterClean);
                if($KhachHangObj->Login()) {
                    $SessionUser = new Session();
                    $SessionUser->SetSession("UserName",$KhachHangObj->GetUserName());
                    $SessionUser->SetSession("KhachHang_Id", $KhachHangObj->GetResultLogin("KhachHang_Id"));
                    
                    $RoleUser = $KhachHangObj->GetResultLogin("Role");
                    if($RoleUser == 0) {
                        header('Location: ./?Action=Home&Login=Success');
                    } else {
                        header('Location: ./?Action=Admin');
                    }
                    
                } else {
                    header("Location: ./?Action=Home&Login=Failed");
                }
            }
        }
    }
?>