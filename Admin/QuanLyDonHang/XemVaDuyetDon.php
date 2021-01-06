<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/KhachHang.php';
    include_once './Model/NoiDungChiTietSP.php';
    $ManageOrder = new KhachHang();
    $HinhAnh = new NoiDungChiTiet();
    $ValueDisplay = $ManageOrder->layRaDiaChiGiaoHang();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page heading -->
    <h1 class="h3 mb-2 text-gray-800">Duyệt đơn hàng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Xem và duyệt đơn hàng
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Kiểu thanh toán</th>
                            <th>Thành tiền</th>
                            <th>Xác minh đúng địa chỉ</th>
                            <th>Sản phẩm</th>
                            <th>Duyệt đơn</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Kiểu thanh toán</th>
                            <th>Thành tiền</th>
                            <th>Xác minh đúng địa chỉ</th>
                            <th>Sản phẩm</th>
                            <th>Duyệt đơn</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($ValueDisplay as $ValueDisplays) {?>
                             <tr>
                                <td><?php echo $TenKhachHang = $ManageOrder->layTenCuaNguoiDung($ValueDisplays['KhachHang_Id'])[0];?></td>
                                <td><?=  $ValueDisplays['Sdt'];?></td>
                                <td><?= $ValueDisplays['Email'];?></td>
                                <td><?php echo $KieuThanhToan = $ManageOrder->timKiemKieuThanhToan($ValueDisplays['ThanhToan_Id'])[0];?></td>
                                <td><?= $ValueDisplays['ThanhTien'];?></td>
                                <td>
                                    <?php 
                                        if($ValueDisplays['SameAddr'] == 1) {
                                            echo "Đã xác minh";
                                        } else {
                                            echo "Chưa xác minh";
                                        }
                                    ?>
                                </td>
                                <td>
                                        <?php 
                                            $GioHang = $ManageOrder->layGioHang();
                                            $SanPhamId = array();
                                            foreach($GioHang as $GioHangs) {
                                                if($GioHangs['KhachHang_Id'] == $ValueDisplays['KhachHang_Id']) {
                                                    $SanPhamId[] =  $GioHangs['SPCT_Id'];
                                        ?>
                                                    
                                                
                                        <?php
                                                }
                                            }
                                            print_r($SanPhamId);
                                            
                                        ?>
                                </td>
                                <td><button>Duyệt đơn</button></td>
                                
                            </tr>
                        <?php }?>
                        <?php 
                            
                        ?> 
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include('./include/Scripts_Upload_Img.php');
include('./include/Scripts_Uoload_SP.php');
include('./include/Scripts_Update_Stt.php');
include_once './Admin/EndHead.php';

?>