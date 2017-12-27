<?php
function query($sql){
    $conn=mysqli_connect('localhost','root','') or die("Loi ket noi");
    mysqli_select_db($conn,'doan') or die("Loi database");    
    mysqli_query($conn, "SET NAMES 'utf8'");
    $result=mysqli_query($conn,$sql) or die("Loi truy van SQL");
    return $result;
    mysqli_close($conn);
};

function insert()
{
    $maSanBay=$_POST['maSanBay'];
    $tenSanBay=$_POST['tenSanBay'];
    $trangThai=$_POST['trangThai'];
    $sql="INSERT INTO `sanbay` (`maSanBay`, `tenSanBay`, `trangThai`) VALUES ('$maSanBay', '$tenSanBay', '$trangThai')";
    query($sql);    
};

function update($maSB)
{
    $maSanBay=$_POST['maSanBay'];    
    $tenSanBay=$_POST['tenSanBay'];
    $trangThai=$_POST['trangThai'];
    $sql="update sanbay set maSanBay='$maSanBay', tenSanBay='$tenSanBay',trangThai='$trangThai' where maSanBay='$maSB'";
    query($sql);
};

function delete($maSB)
{
    $sql="delete from sanbay where maSanBay='$maSB'";
    query($sql);
};
?>