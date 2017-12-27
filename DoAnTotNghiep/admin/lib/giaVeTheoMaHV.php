<?php
function query($sql){
    $conn=mysqli_connect('localhost','root','') or die("Loi ket noi");
    mysqli_select_db($conn,'doan') or die("Loi database");    
    mysqli_query($conn, "SET NAMES 'utf8'");
    $result=mysqli_query($conn,$sql) or die("Loi truy van SQL");
    mysqli_close($conn);
    return $result;
};
function htGiaVeTheoHVCB($maCB,$maHV)
{
    $sql="select donGia from hangve_chuyenbay where maChuyenBay='$maCB' and maHangVe='$maHV'";
    return query($sql);    
};        
    $maCB=$_GET['maCB'];    
    $maHV=$_GET['maHV'];
    $donGiaTheoHVCB=htGiaVeTheoHVCB($maCB,$maHV);
    while ($row=mysqli_fetch_row($donGiaTheoHVCB))
    {
        // var_dump($row);
    ?>
    <input style="width: 450px; margin-left:5px;"  name="donGia" id="donGia" value="<?php echo $row[0]; ?>" >
<?php   
    }
?>



