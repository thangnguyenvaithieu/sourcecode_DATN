<style>
    .dong{
        display:inline;
    }
    .canle{
        float:right;
    }
</style>
<?php
    include_once "model/functionCommon.php";
?>
<?php
    // echo '<script language="javascritp">';
    // echo 'alert("Hello");';
    // echo '</script>';
    $nguoiLon = $_GET['nl'];
    $treEm = $_GET['te'];
    $treSoSinh = $_GET['tss'];
    $maHV = $_GET["hv"];
    if(isset($_GET['checked']))
    {
        $maCB = $_GET['checked'];
        // var_dump($maCB);
        $rowsGiaVe=layGiaVe($maCB,$maHV);
        $rowGiaVe=mysqli_fetch_array($rowsGiaVe);
    }
?>          
<div >
    CHUYẾN VỀ
</div>            
<div>
    <label>Giá vé(chưa bao gồm thuế phí)</label>
    <div>
        <span><?php echo $nguoiLon; ?></span>
        <div class="dong">Người lớn:</div>
        <div class="dong canle">
            <span><?php echo $nguoiLon ."x". $rowGiaVe['donGia']; ?></span> VNĐ
        </div>
    </div>
    <div>
        <span><?php echo $treEm;?></span>
        <div class="dong">Trẻ em:</div>
        <div class="dong canle">
            <span><?php echo $treEm ."x". (0.85 * $rowGiaVe['donGia']); ?></span> VNĐ
        </div>
    </div>
    <div>
        <span><?php echo $treSoSinh; ?></span>
        <div class="dong">Sơ sinh:</div>
        <div class="dong canle">
            <span><?php echo $treSoSinh ."x 0";?></span> VNĐ
        </div>
    </div>
    <div>
        <div class="dong">
            Tổng giá tiền
        </div>            
        <div class="dong canle">
            <span style="display: inline" id="tongdi"></span>
            <?php echo ($nguoiLon*$rowGiaVe['donGia'] + $treEm*0.85*$rowGiaVe['donGia']);?> VNĐ
        </div>
    </div>         
</div>
<!-- ?> -->

