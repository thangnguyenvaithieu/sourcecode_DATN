<?php
include "functionCommon.php";

$tenSB=$_GET['tenSB'];
// var_dump($tenSB);
$dsNDND=htNoiDenTheoNoiDi($tenSB);
// var_dump($dsNDND);
while ($row=mysqli_fetch_array($dsNDND)) 
{
?>
    <option value="<?php echo $row['0']; ?>"><?php echo $row['0']; ?></option>
<?php
}
?>