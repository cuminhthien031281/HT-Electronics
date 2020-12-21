<?php include_once './View/Head.php';?>
<?php include_once './Model/QuerySP.php';?>

    <?php $SPCT = new QuerySP();
            $SPCT->queryTableSPCT();
            $DisplaySPCT = $SPCT->getQuerySanPhamChiTiet();
            $SPCT->queryTableImageSPCT();
            $ImageSPCT = $SPCT->getQueryTableHinhAnhSPCT();
    ?>

    <table>
        <thead>
            <tr>
                <td>TenSPCT</td>    
                <td>DonGia</td> 
                <td>SoLuong</td>
                <td>HinhAnh</td>
                <td>Upload Hinh anh</td>
                <td>Update status san pham</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($DisplaySPCT as $DisplaySPCTs) {?>
            <tr>
                    <td><?php echo $DisplaySPCTs['TenSPCT'];?></td>
                    <td><?php echo $DisplaySPCTs['DonGia'];?></td>
                    <td><?php echo $DisplaySPCTs['SoLuong'];?></td>
                    <?php foreach($ImageSPCT as $ImageSPCTs)  {
                            if($ImageSPCTs['SPCT_Id'] == $DisplaySPCTs['SPCT_Id']) {
                    ?>
                                <td><img src="Public/ImageSPCT/<?php echo $ImageSPCTs['Full'];?>" alt="SPCT IMG"></td>
                                <td>
                                    <form action="?Action=Admin&Actionsp=uploadhinhanhcuasanpham" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="TenSP" value="<?php echo $DisplaySPCTs['TenSPCT']?>">
                                        <input type="file" name="file">
                                        <button type="submit" name="SubmitHinhAnh" value="SubmitImageSanPham">Them Hinh anh</button>
                                    </form>
                                </td>
            </tr>
                    <?php 
                            } else {
                    ?>
                                <td>Chua co hinh anh</td>
                                <td>
                                    <form action="?Action=Admin&Actionsp=uploadhinhanhcuasanpham" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="TenSP" value="<?php echo $DisplaySPCTs['TenSPCT']?>">
                                        <input type="file" name="file">
                                        <button type="submit" name="SubmitHinhAnh" value="SubmitImageSanPham">Them Hinh anh moi</button>
                                    </form>
                                </td>
                    <?php 
                            }
                        }
                    ?>
                    <?php if($DisplaySPCTs['Status'] == 0) {?>
                            <td>Chua active</td>
                            <td>
                                <form action="?Action=Admin&Actionsp=activesp" method="POST">
                                    <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                    <input type="hidden" name="Value" value="1">
                                    <button type="submit" name="Update" value="UpdateSPCTStt">Active San pham</button>
                                </form>
                            </td>
                        
                    <?php } else { ?>
                            <td>Da Active</td>
                            <td>
                                <form action="?Action=Admin&Actionsp=activesp" method="POST">
                                    <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                    <input type="hidden" name="Value" value="0">
                                    <button type="submit" name="Update" value="UpdateSPCTStt">Deactive San pham</button>
                                </form>
                            </td>
                    <?php } ?>            
        <?php 
        }
        ?>
        </tbody>
    </table>

<?php include_once './View/Footer.php';?>
<?php include_once './View/EndHead.php';?>