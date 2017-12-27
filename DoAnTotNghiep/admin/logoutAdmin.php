<?php
    session_start();
    if(isset($_SESSION['hoTenAdmin'])){
        session_unset();        
        header("location:../index.php");
    }
?>