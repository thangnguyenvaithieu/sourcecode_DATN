<?php
    session_start();
    if(isset($_SESSION['hoTen']) && isset($_SESSION['email']) && isset($_SESSION['soDienThoai']) && isset($_SESSION['gioiTinh'])){
        session_unset();
        header("location:index.php");
    }
?>