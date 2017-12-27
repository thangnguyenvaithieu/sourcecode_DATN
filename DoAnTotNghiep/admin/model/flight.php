<?php
function query($sql){
    $conn=mysqli_connect('localhost','root','') or die("Loi ket noi");
    mysqli_select_db($conn,'doan') or die("Loi database");    
    mysqli_query($conn, "SET NAMES 'utf8'");
    $result=mysqli_query($conn,$sql) or die("Loi truy van SQL");
    mysqli_close($conn);
    return $result;            
};

function insert()
{
    $maChuyenBay=$_POST['maChuyenBay'];
    $maHangMayBay=$_POST['maHangMayBay'];
    $maTuyenBay=$_POST['maTuyenBay'];
    $ngayKhoiHanh=$_POST['ngayKhoiHanh'];
    $ngayDen=$_POST['ngayDen'];
    $gioKhoiHanh=$_POST['gioKhoiHanh'];
    $gioDen=$_POST['gioDen'];    
    $trangThai=$_POST['trangThai'];
    $sql="INSERT INTO `chuyenbay` (`maChuyenBay`, `ngayKhoiHanh`, `ngayDen`, `gioKhoiHanh`, `gioDen`, `trangThai`, `maHangMayBay`, `maTuyenBay`) VALUES ('$maChuyenBay', '$ngayKhoiHanh', '$ngayDen', '$gioKhoiHanh', '$gioDen', ' $trangThai', '$maHangMayBay', '$maTuyenBay')";   
    query($sql);      
};

function insertHVCB()
{
    $maChuyenBay=$_POST['maChuyenBay'];
    $maHangVe=$_POST['maHangVe'];
    $donGia=$_POST['donGia'];
    $sql="insert into hangve_chuyenbay(maChuyenBay,maHangVe,donGia) values('$maChuyenBay','$maHangVe','$donGia')";
    // var_dump($sql);    
    query($sql);       
};

// Sẽ được sử dụng bên khách hàng
function updateMaPDC($maCB,$maHV)
{
    $sql="update hangve_chuyenbay set maPhieuDatCho='$maPhieuDatCho' where maChuyenBay='$maCB' and maHangVe='$maHV'";
    query($sql);
}


function update($maCB)
{        
    $maChuyenBay=$_POST['maChuyenBay'];
    $maHangMayBay=$_POST['maHangMayBay'];
    $maTuyenBay=$_POST['maTuyenBay'];
    $ngayKhoiHanh=$_POST['ngayKhoiHanh'];
    $ngayDen=$_POST['ngayDen'];
    $gioKhoiHanh=$_POST['gioKhoiHanh'];
    $gioDen=$_POST['gioDen'];    
    $trangThai=$_POST['trangThai'];
    $sql="update chuyenbay set maChuyenBay='$maChuyenBay',maHangMayBay='$maHangMayBay',maTuyenBay='$maTuyenBay',ngayKhoiHanh='$ngayKhoiHanh',ngayDen='$ngayDen',gioKhoiHanh='$gioKhoiHanh',gioDen='$gioDen',trangThai='$trangThai' where maChuyenBay='$maCB'";
    // var_dump($sql);
    query($sql);
};

// Update hạng vé của chuyến bay
function updateCBHV($maCB,$maHV)
{
    $maChuyenBay=$_POST['maChuyenBay'];
    $maHangVe=$_POST['maHangVe'];
    $donGia=$_POST['donGia'];       
    $sql="update hangve_chuyenbay set maChuyenBay='$maChuyenBay', maHangVe='$maHangVe', donGia='$donGia' where maChuyenBay='$maCB' and maHangVe='$maHV'";    
    query($sql);  
}

// Update khi mã chuyến bay thay đổi vào bảng hangve_chuyenbay
function updateBSCBHV($maCB)
{   
    $maChuyenBay=$_POST['maChuyenBay'];
    $sql="update hangve_chuyenbay set maChuyenBay='$maChuyenBay' where maChuyenBay='$maCB'"; 
    query($sql);
}

function delete($maCB)
{
    $sql="delete from chuyenbay where maChuyenBay='$maCB'";
    query($sql);
};

function deleteHVCB($maCB)
{
    $sql="delete from hangve_chuyenbay where maChuyenBay='$maCB'";
    query($sql);
};

?>