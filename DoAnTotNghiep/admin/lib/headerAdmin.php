<?php
    session_start();
    ob_start();
?>
<?php if(!isset($_SESSION['hoTenAdmin']))
    {
    header('location:../login.php');  
    }
     else 
        {
    ?>
        <div>
            <div layout="row">
                        <!-- Logo -->
                <div flex="10"></div>
                <div flex="30">
                <div layout="row">
                                <div>
                                    <a href="index.php"><img src="../img/VNA_logo_vn.png" alt="" style="max-width: 100%; height: auto; margin: 2px;" /></a>
                                    <md-tooltip md-direction="bottom">Về trang quản trị viên
                                    </md-tooltip>
                                </div>
                                <div>
                                    <a href="index.php"><img src="../img/skyteam.png" alt="Skyteam" style="margin-top: 20px;  width: 50%; margin-left: 5px;"></a>
                                </div>
                            </div>
                        </div>
                        <!-- Kết thúc logo -->
                        <!-- Đăng xuất -->
                        <div flex="60" layout-align="end center" layout="row">               
                            <?php echo "Xin chào: ".$_SESSION['hoTenAdmin']; ?>
                            <a href="logoutAdmin.php"><md-button class="md-raised md-primary" style="color:white;">Đăng xuất</md-button></a>                                       
                        </div>
            </div>            
        <?php 
            }
        ?>