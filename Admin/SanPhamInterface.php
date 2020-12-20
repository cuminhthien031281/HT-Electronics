<?php include_once './View/Head.php';?>
<?php include_once './Model/QuerySP.php';?>

    <?php $SPCT = new QuerySP();
            $SPCT->queryTableSPCT();
            $DisplaySPCT = $SPCT->getQuerySanPhamChiTiet();
    ?>

    <table>
        <tr>
        <td>TenSPCT</td>    
        <td>DonGia</td> 
        <td>SoLuong</td>
        <td>HinhAnh</td>
        </tr>
        <?php foreach($DisplaySPCT as $DisplaySPCTs) {?>
            <tr>
                <form action="?Action=Admin&Actionsp=uploadHinhAnhSP" method="POST"></form>
                    <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCT['SPCT_Id'];?>">
                    <td><?php echo $DisplaySPCTs['TenSPCT'];?></td>
                    <td><?php echo $DisplaySPCTs['DonGia'];?></td>
                    <td><?php echo $DisplaySPCTs['SoLuong'];?></td>
                    <td>Khong</td>
                    <td><Button type="submit" name="uploadhinhanhsanpham">UploadHinhAnh</Button></td>
                </form>
            </tr>

        <?php 
        }
        ?>
    </table>

<?php include_once './View/Footer.php';?>
<?php include_once './View/EndHead.php';?>