<?php
function query($sql){
    $conn=mysqli_connect('localhost','root','') or die("Loi ket noi");
    mysqli_select_db($conn,'doan') or die("Loi database");    
    mysqli_query($conn, "SET NAMES 'utf8'");
    $result=mysqli_query($conn,$sql) or die("Loi truy van SQL");
    mysqli_close($conn);
    return $result;            
};

function hienThiTenSBMaSB($tenSB)
{
    $sql="select maSanBay from sanbay where tenSanBay='$tenSB'";
    query($sql);
};

function insert()
{
    $maTuyenBay=$_POST['maTuyenBay'];
    $noiDi=$_POST['noiDi'];
    $noiDen=$_POST['noiDen'];
    $trangThai=$_POST['trangThai'];
    $sql="INSERT INTO `tuyenbay` (`maTuyenBay`, `noiDi`, `noiDen`, `trangThai`) VALUES ('$maTuyenBay', '$noiDi', '$noiDen', '$trangThai')";
    //  echo $sql;
    query($sql); 
    //  var_dump(query($sql));
    //  exit();  
};

function insertTBSBDi()
{
    $maTuyenBay=$_POST['maTuyenBay'];
    $maSanBayDi=$_POST['maSanBayDi'];
    $sql="insert into tuyenbay_sanbay(maTuyenBay,maSanBay) values('$maTuyenBay','$maSanBayDi')";
    query($sql);   
};

function insertTBSBDen()
{
    $maTuyenBay=$_POST['maTuyenBay'];
    $maSanBayDen=$_POST['maSanBayDen'];
    // var_dump($maSanBayDen);
    $sql="insert into tuyenbay_sanbay(maTuyenBay,maSanBay) values('$maTuyenBay','$maSanBayDen')";
    query($sql);
};

function update($maTB)
{        
    $maTuyenBay=$_POST['maTuyenBay'];
    $noiDi=$_POST['noiDi'];
    $noiDen=$_POST['noiDen'];
    $trangThai=$_POST['trangThai'];
    $sql="update tuyenbay set maTuyenBay='$maTuyenBay', noiDi='$noiDi',noiDen='$noiDen',trangThai='$trangThai' where maTuyenBay='$maTB'";
    // var_dump($sql);
    query($sql);
};

function updateTBSBDi($maTB,$maSanBayDiCu)
{
    $maTuyenBay=$_POST['maTuyenBay'];
    $maSanBayDiMoi=$_POST['maSanBayDi'];
    // var_dump($maSanBayDi);    
    $sql="update tuyenbay_sanbay set maTuyenBay='$maTuyenBay', maSanBay='$maSanBayDiMoi' where maTuyenBay='$maTB' and maSanBay='$maSanBayDiCu'";
    // var_dump($sql);
    query($sql);  
}

function updateTBSBDen($maTB,$maSanBayDenCu)
{
    $maTuyenBay=$_POST['maTuyenBay'];
    $maSanBayDenMoi=$_POST['maSanBayDen'];
    // var_dump($maSanBayDen);
    $sql="update tuyenbay_sanbay set maTuyenBay='$maTuyenBay', maSanBay='$maSanBayDenMoi' where maTuyenBay='$maTB' and maSanBay='$maSanBayDenCu'";
    // var_dump($sql);
    query($sql);  
};

function delete($maTB)
{
    $sql="delete from tuyenbay where maTuyenBay='$maTB'";
    query($sql);
};

function deleteTBSB($maTB)
{
    $sql="delete from tuyenbay_sanbay where maTuyenBay='$maTB'";
    query($sql);
};

?>