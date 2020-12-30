<?php 

    class BuyProductController {

        public function themVaoGioHang($Post, $id_sp, $gia, $ten_sp, $quantity) {
            if(isset($Post)) {
                if(!isset($_SESSION['UserName'])) {
                    echo "<script>alert('Login first');
                            window.location.href='/HT-Electronics/?Action=Login';
                        
                        </script>";
                } else {
                    if(isset($_SESSION['cart']))
                    {
                    
                        $myitems = array_column($_SESSION['cart'], 'ten_sp');
                        if(in_array($_POST['ten_sp'], $myitems)) {
                            echo "<script>alert('The item already have in cart');
                                window.location.href='/HT-Electronics/';
                        
                            </script>";
                        
                        } else {
                            $count = count($_SESSION['cart']);
                            $_SESSION['cart'][$count] = array('id_sp' => $id_sp, 'gia' => $gia, 'ten_sp' => $ten_sp, 'quantity_SP' => $quantity);
                            echo "<script>window.location.href='/HT-Electronics/'</script>";
                        }
                    
                    } else 
                    {
                        $_SESSION['cart'][0] = array('id_sp' => $id_sp, 'gia' => $gia, 'ten_sp' => $ten_sp, 'quantity_SP' => $quantity);
                    }
                }
        
                
            }
        }

        public function xoaGiohang($Post, $ten_sp) {
            if(isset($_POST['Remove_Item'])) {
                foreach($_SESSION['cart'] as $key=>$value) {
                    if($value['ten_sp'] == $ten_sp) {
                        unset($_SESSION['cart'][$key]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                        echo "<script>
                            alert('Item removed');
                            window.location.href='/HT-Electronics/?Action=GioHang';
                        </script>";
                    }
                }
            }
        }
    }


?>