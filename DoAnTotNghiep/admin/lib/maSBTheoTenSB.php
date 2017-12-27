<?php
function query($sql){
    $conn=mysqli_connect('localhost','root','') or die("Loi ket noi");
    mysqli_select_db($conn,'doan') or die("Loi database");    
    mysqli_query($conn, "SET NAMES 'utf8'");
    $result=mysqli_query($conn,$sql) or die("Loi truy van SQL");
    mysqli_close($conn);
    return $result;
};
function hienThiMaSBTenSB($tenSB)
{
    $sql="select * from sanbay where tenSanBay='$tenSB'";
    return query($sql);    
};  
    $ktNoiDi=false;
    $ktNoiDen=true;

    if($ktNoiDen==true)
    {        
        $ktNoiDi=true;
        $tenSanBayDi=$_GET['noiDi'];     
        $maSBTheoTenSB=hienThiMaSBTenSB($tenSanBayDi);
    while ($row=mysqli_fetch_row($maSBTheoTenSB)) {
    ?> 
    <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
    <?php   
    }
    ?>
<?php   
    }
?>

<?php 
    if($ktNoiDi==true)
        {      
            $ktNoiDen=false;   
            $tenSanBayDen=$_GET['noiDen'];
            $maSBTheoTenSB=hienThiMaSBTenSB($tenSanBayDen);
        while ($row=mysqli_fetch_array($maSBTheoTenSB)) {
        ?> 
        <option value="<?php echo $row['0']; ?>"><?php echo $row['0']; ?></option>
    <?php   
        }
    ?>
<?php 
    }
?>
