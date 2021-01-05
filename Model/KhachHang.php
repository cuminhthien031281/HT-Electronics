<?php 
    require_once 'ConnectDb.php';
    class KhachHang extends Db{
        private $username = '';
        private $password = '';
        private $_userID;
        private $_imgName;
        private $_imgType;
        private $_resultUserReg;
        private $_typeDelive;
        public function __construct()
        {
            parent::__construct();
        }
        //Set type delivery 
        public function SetTypeDelive($typeDelive) {
            $this->_typeDelive = $typeDelive;
        }

        public function GetTypeDelive() {
            return $this->_typeDelive;
        }
        //Set $username.
        public function SetUsrName($Username) {
            $this->username = $Username;
        }
        //Get $username.
        public function GetUserName() {
            return $this->username;
        }
        //Set $password.
        public function SetPassword($Password) {
            $this->password = $Password;
        }
        //Get $password.
        public function GetPassword() {
            return $this->password;
        }
        //Get $_userID.
        public function GetUsrId() {
            return $this->_userID;
        }
        //Get $_imgName.
        public function GetImgName() {
            return $this->_imgName;
        }
        //Get $_imgType.
        public function GetImgType() {
            return $this->_imgType;
        }
        //Get $_resultUserReg, result of query reg use for update img of user.
        public function GetResultUsrReg() {
            return $this->_resultUserReg;
        }
        //Get $_result, result of query login, use to check role column.
        public function GetResultLogin($Column) {
            return $this->_result[$Column];
        }
        //Register user method
        public function Register($Email) {
            //Hash the password before execute statement
            $PasswordHash = password_hash($this->password, PASSWORD_BCRYPT);
            $RoleUser = 0;
            //Statement to insert to khachhang table
            $StatementAddUser = $this->_pdo->prepare("INSERT INTO khachhang(UserName, Password, Email, Role) VALUES (?, ?, ?, ?)");
            $StatementAddUser->bindParam(1, $this->username);
            $StatementAddUser->bindParam(2, $PasswordHash);
            $StatementAddUser->bindParam(3, $Email);
            $StatementAddUser->bindParam(4, $RoleUser);
            //Execute success
            if($StatementAddUser->execute()) {
                $StatementAddUser->closeCursor();
                //Select user with UserName
                $StatementSelectUser = $this->_pdo->prepare("SELECT * FROM khachhang where UserName = ?");
                $StatementSelectUser->bindParam(1, $this->username);
                $StatementSelectUser->execute();
                $this->_resultUserReg = $StatementSelectUser->fetch();
                $StatementSelectUser->closeCursor();
                //Set $_userID to insert to profile img table
                $this->_userID = $this->_resultUserReg['KhachHang_Id'];
                $NameOfImage = 'DefaultImg';
                $StatusOfImage = 0;
                $TypeOfImage = 'jpg';
                //Insert Into table profileimg
                $StatementAddProfileImg = $this->_pdo->prepare("INSERT INTO profileimg(KhachHang_Id, NameImg, Status, Type) VALUES (?, ?, ?, ?)");
                $StatementAddProfileImg->bindParam(1, $this->_userID);
                $StatementAddProfileImg->bindParam(2, $NameOfImage);
                $StatementAddProfileImg->bindParam(3, $StatusOfImage);
                $StatementAddProfileImg->bindParam(4, $TypeOfImage);
                $StatementAddProfileImg->execute();
                $StatementAddProfileImg->closeCursor();
                return 1;
            }
            return 0;
        }
        //Login User method.
        public function Login() {
            //Statement select user from khachhang table
            $StatementSelectUser = $this->_pdo->prepare("SELECT* FROM khachhang WHERE UserName=?");
            $StatementSelectUser->bindParam(1, $this->username);
            $StatementSelectUser->execute();
            //Check the result if have result 
            if($StatementSelectUser->rowCount() == 1) {
                $this->_result = $StatementSelectUser->fetch();
                $StatementSelectUser->closeCursor();
                if(password_verify($this->password, $this->_result['Password'])) {
                    $this->username = $this->_result['UserName'];
                    return 1;
                }
            }
            return 0;
        }
        //Check Img user
        public function CheckImg($UserId) {
            $StatementSelectUser = $this->_pdo->prepare("SELECT * FROM profileimg WHERE KhachHang_Id = ?");
            $StatementSelectUser->bindParam(1, $UserId);
            $StatementSelectUser->execute();
            $this->_result = $StatementSelectUser->fetch();
            $StatementSelectUser->closeCursor();
            $this->_imgType = $this->_result['Type'];
            $this->_imgName = $this->_result['NameImg'];
            if($this->_result['Status'] == 1) {
                 $this->_userID = $UserId;
                 return true;
            }
            return false;
        }

        public function muaHang($UserId, $FullName, $Email, $Address, $City, $Quan, $SoDienThoai, $ThanhToan_Id, $ThanhTien, $GioHang_Id) {
            $MuaHangStatement = $this->_pdo->prepare("INSERT INTO diachigiaohang(
                                                                        KhachHang_Id, 
                                                                        Ten,
                                                                        DiaChi, 
                                                                        City, 
                                                                        Quan, 
                                                                        Sdt, 
                                                                        Email, 
                                                                        ThanhToan_Id, 
                                                                        ThanhTien, 
                                                                        GioHang_Id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $MuaHangStatement->bindParam(1, $UserId);
            $MuaHangStatement->bindParam(2, $FullName);
            $MuaHangStatement->bindParam(3, $Address);
            $MuaHangStatement->bindParam(4, $City);
            $MuaHangStatement->bindParam(5, $Quan);
            $MuaHangStatement->bindParam(6, $SoDienThoai);
            $MuaHangStatement->bindParam(7, $Email);
            $MuaHangStatement->bindParam(8, $ThanhToan_Id);
            $MuaHangStatement->bindParam(9, $ThanhTien);
            $MuaHangStatement->bindParam(10, $GioHang_Id);
            $MuaHangStatement->execute();
            $MuaHangStatement->closeCursor();
            return $MuaHangStatement;
        }

        
    }
?>