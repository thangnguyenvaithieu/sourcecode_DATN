<?php include "model/functionCommon.php" ?>
 <?php   
    if(isset($_POST['datve']))
    {   
        $nguoiLon = $_POST['nguoiLon'];
        $treEm = $_POST['treEm'];
        $treSoSinh = $_POST['treSoSinh'];
        $maHV = $_POST['hangVe'];
        $maCB1C =  $_POST['maCB1C'];
        if(isset($_POST['maCBKH']))
        {
            $maCBKH = $_POST['maCBKH'];
        }

        // Thông tin hành kháchs
        $hoTenHK = $_POST['hoTenHK'];
        // var_dump($hoTenHK);
        // die();
        $gioiTinhHK = $_POST['gioiTinhHK'];

        if($treEm > 0)
        {
            $hoTenTE = $_POST['hoTenTE'];
            $gioiTinhTE = $_POST['gioiTinhTE'];
        }

        if($treSoSinh > 0)
        {
            $hoTenTSS = $_POST['hoTenTSS'];
            $gioiTinhTSS = $_POST['gioiTinhTSS'];
        }

         if(isset($_SESSION['idUser']))
        {
            $idUser=$_SESSION['idUser'];
        }
        else
            $idUser  = 'null';
        
        $maPhieuDatCho = mt_rand(1000,10000000); 
        // var_dump($maPhieuDatCho);
        $now = getdate();
        $ngayDatVe = $now['year']."-".$now['mon']."-".$now['mday'];
        $kiemtra = true;       

        // Thông tin người liên hệ
        $hoTenNLH = $_POST['hoTenNLH'];
        $email = $_POST['email'];
        $soDienThoai = $_POST['soDienThoai'];
        $gioiTinhNLH = $_POST['gioiTinhNLH'];

        if($treEm > 0 and $treSoSinh > 0)
        {
            if($hoTenHK == "" || $gioiTinhHK == "" || $hoTenTE == "" || $gioiTinhTE == "" || $hoTenTSS == ""
             || $gioiTinhTSS == "" || $hoTenNLH == "" || $gioiTinhNLH == "")
             {
                echo '<script languague="javascript">';
                    echo 'toastr.warning("Các trường không được bỏ trống mức 1")';
                echo '</script>';
                $kiemtra = false;                
             }
        } 
        else 
        {
            if($treEm > 0 and $treSoSinh == 0)
            {            
                if($hoTenHK == "" || $gioiTinhHK == "" || $hoTenTE == "" || $gioiTinhTE == "" || $hoTenNLH == "" || $gioiTinhNLH == "" || $email =="" || $soDienThoai =="" )
                {
                    echo '<script languague="javascript">';
                        echo 'toastr.warning("Các trường không được bỏ trống mức 2!")';
                    echo '</script>';
                    $kiemtra = false;
                }         
            }
            else 
            {
                if($treSoSinh > 0 and $treEm == 0)
                {            
                    if($hoTenHK == "" || $gioiTinhHK == "" || $hoTenTSS == "" || $gioiTinhTSS == ""  || $hoTenNLH == ""
                     || $gioiTinhNLH == "" || $email =="" || $soDienThoai =="" )
                    {
                        echo '<script languague="javascript">';
                            echo 'toastr.warning("Các trường không được bỏ trống mức 3!")';
                        echo '</script>';
                        $kiemtra = false;                        
                    }         
                
                }
                else  
                {              
                    if($treSoSinh == 0 and $treEm == 0)
                    {            
                        if($hoTenHK == "" || $gioiTinhHK == "" || $hoTenNLH == "" || $gioiTinhNLH == "" || $email =="" || $soDienThoai =="")
                        {
                            echo '<script languague="javascript">';
                                echo 'toastr.warning("Các trường không được bỏ trống mức 4!")';
                            echo '</script>';
                        $kiemtra = false;                            
                        }         
                    }  
                    else
                    {
                        $kiemtra = false;
                    }  
                }            
            }
        }

        if(!is_numeric($soDienThoai))
        {

            echo '<script languague="javascript">';
              echo 'toastr.warning("Số điện thoại nhập sai định dạng. Mời bạn nhập lại số điện thoại!")';
            echo '</script>';
            // echo 'Số điện thoại nhập sai định dạng. Mời bạn nhập lại số điện thoại!';
            $kiemtra = false;                  
        }
        
        // var_dump($ngayDatVe);
        // var_dump($ngayDatVe);        
        // Chèn maPhieuDatCho vào bảng Phieu dat cho > hangve_chuyenbay, hanhKhach
        if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)) {
            echo '<script languague="javascript">';
                echo 'toastr.warning("Email nhập sai định dạng. Mời bạn nhập lại email ở bước trước")';
            echo '</script>';
            // echo "Email nhập sai định dạng.Mời bạn nhập lại email ở bước trước!";
            $kiemtra = false;                 
        }
            else 
        {
            // Thêm dữ liệu vào bgnar phieudatcho > update hangve_chuyenbay > thêm dữ liệu vào bảng hanhkhach
            $sql="INSERT INTO phieudatcho (maPhieuDatCho, ngayDatVe, hoTen, email, gioiTinh, soDienThoai, trangThaiThanhToan, idUser)
            VALUES ($maPhieuDatCho, '$ngayDatVe', '$hoTenNLH', '$email', $gioiTinhNLH, $soDienThoai, 0, $idUser)";
            query($sql);
            // var_dump($sql);
                
                $rowID1C = layID($maCB1C,$maHV);
                $ID1C = mysqli_fetch_array($rowID1C);
                // var_dump($ID1C);
                $sqlID1C  = "INSERT INTO hangve_chuyenbay_phieudatcho(ID,maPhieuDatCho) values ($ID1C[0],$maPhieuDatCho)";
                query($sqlID1C);                
                // var_dump($sql);
            if(isset($_POST['maCBKH']))
            {
                $rowIDKH = layID($maCBKH,$maHV);
                $IDKH = mysqli_fetch_array($rowIDKH);
                $sqlID1C = "INSERT INTO hangve_chuyenbay_phieudatcho(ID,maPhieuDatCho) values ($IDKH[0],$maPhieuDatCho)";
                query($sqlID1C);
            }
            
            for($i = 0; $i < $nguoiLon ; $i++)
            {
                $sql = "INSERT INTO hanhkhach ( hoTenHK, gioiTinhHK, maPhieuDatCho) VALUES ( '$hoTenHK[$i]', '$gioiTinhHK[$i]', '$maPhieuDatCho')" ;
                query($sql);
                // var_dump($sql);
            }  
            if($treEm > 0) 
            {
                    for($i = 0; $i < $treEm ; $i++)
                {
                    $sql = "INSERT INTO hanhkhach ( hoTenHK, gioiTinhHK, maPhieuDatCho) VALUES ( '$hoTenTE[$i]', '$gioiTinhTE[$i]', '$maPhieuDatCho')" ;
                    query($sql);
                }
            }    
               if($treSoSinh > 0) 
            {
                    for($i = 0; $i < $treSoSinh ; $i++)
                {
                    $sql = "INSERT INTO hanhkhach ( hoTenHK, gioiTinhHK, maPhieuDatCho) VALUES ( '$hoTenTSS[$i]', '$gioiTinhTSS[$i]', '$maPhieuDatCho')" ;
                    query($sql);
                }
            }         

        }        
    }
 ?>

<?php if($kiemtra == true) 
{
?>
    <form action="#">     
    <!--Thông tin chuyến bay  -->
    <?php
        $rowsCB1C = layCTCB($maCB1C,$maHV);
        // var_dump($rowCB1C);
        $rowCB1C = mysqli_fetch_array($rowsCB1C);
        if(isset($_POST['maCBKH']))
        {
            $rowsCBKH = layCTCB($maCBKH,$maHV);
            $rowCBKH = mysqli_fetch_array($rowsCBKH);
        }
     ?>
    <!-- <center> -->
    <div layout="row">
    <div flex="10"></div>
     <div layout="column" flex>
        <div style="text-transform:uppercase; font-size:25px;text-align:center; display:block; font-weight:bold;">Thông tin chuyến bay đã đặt</div>
        <div layout="column"style="margin-left:20px; margin-bottom:10px;">
            <div layout="row" style="font-size: 20px;">Thông tin chuyến bay đi</div>
            <div layout="row">
                <div flex="10">Sân bây đi:</div>
                <div flex="20" style="font-weight:bold;">
                    <?php echo $rowCB1C['noiDi'];?>     
                </div>
                <div flex="10">Sân bây về:</div>
                <div flex="20" style="font-weight:bold;">
                    <?php echo $rowCB1C['noiDen'];?>     
                </div>                
            </div> 
            <?php if(isset($_POST['maCBKH']))
             {
            ?>
            <div layout="row" style="font-size: 20px;">Thông tin chuyến bay về:</div>
            <div layout="row">
                <div flex="10">Sân bây đi:</div>
                <div flex="20" style="font-weight:bold;">
                    <?php echo $rowCBKH['noiDi'];?>     
                </div>
                <div flex="10">Sân bây về:</div>
                <div flex="20" style="font-weight:bold;">
                    <?php echo $rowCBKH['noiDen'];?>     
                </div>                
            </div> 
            <?php
             }
             ?> 
             
            <md-divider style="border-top-width: 2px !important; width:400px; color:blue; margin:2px;"></md-divider>

            <div layout="row" style="font-size: 20px;">Tổng số lượng hành khách: <?php echo ($nguoiLon + $treEm + $treSoSinh);?> hành khách</div>
            <div layout="row" style="font-size: 20px;">Bao gồm: <?php echo $nguoiLon?> người lớn, <?php echo $treEm;?> trẻ em và <?php echo $treSoSinh;?> trẻ sơ sinh</div>  
            <div layout="row" style="font-size: 20px;">Thông tin hành khách:</div>
             <div layout="column">
                <ul style="list-style:none;">   
                    <?php for($i = 0;  $i < $nguoiLon; $i++) 
                    {?>
                        <li>
                            <div layout="row">
                                <div flex="15">Họ tên người lớn:</div>
                                <div flex style="font-weight:bold;"><?php echo $hoTenHK[$i]; ?></div>
                            </div>                    
                        </li>
                    <?php
                    }  
                    ?>     
                    <?php if($treEm > 0)
                    {
                        for($i = 0;  $i < $treEm; $i++) 
                         {?>
                            <li>
                                <div layout="row">
                                    <div flex="15">Họ tên trẻ em:</div>
                                    <div flex style="font-weight:bold;"><?php echo $hoTenTE[$i]; ?></div>
                                </div>                    
                            </li>
                    <?php
                         }
                    }  
                    ?>  
                    <?php
                    if($treSoSinh > 0)
                    {
                     for($i = 0;  $i < $treSoSinh; $i++) 
                        {?>
                            <li>
                                <div layout="row">
                                    <div flex="15">Họ tên trẻ sơ sinh:</div>
                                    <div flex style="font-weight:bold;"><?php echo $hoTenTSS[$i]; ?></div>
                                </div>                    
                            </li>
                    <?php
                        }
                    }  
                    ?>              
                                  
            </div> 
            <div layout="row" style="font-size: 20px;">Thông tin người liên hệ:</div>
            <div layout="column">
                <ul style="list-style:none;">            
                    <li>
                        <div layout="row">
                            <div flex="15">Họ tên người liên hệ:</div>
                            <div flex style="font-weight:bold;"><?php echo $hoTenNLH; ?></div>
                        </div>                    
                    </li>
                    <li>
                        <div layout="row">
                            <div flex="15">Email:</div>
                            <div flex style="font-weight:bold;"><?php echo $email; ?></div>
                        </div>                    
                    </li>
                    <li>
                        <div layout="row">
                            <div flex="15">Số điện thoại:</div>
                            <div flex style="font-weight:bold;"><?php echo $soDienThoai; ?></div>
                        </div>                    
                    </li>
                </ul>                 
            </div>           

            <md-divider style="border-top-width: 2px !important; width:400px; color:blue; margin:2px;"></md-divider>
            
            <div layout="row" style="font-size: 20px;">Chi phí chuyến bay:</div> 
            <div layout="column">
                    <div layout="row">
                        <div flex="15">Chuyến bay chiều đi:</div>                    
                        <div flex="20" style="font-weight:bold;">
                            <?php  $tongdi = $nguoiLon* $rowCB1C['donGia'] + 0.85 * $treEm * $rowCB1C['donGia']; echo number_format($tongdi) ;?> VND     
                        </div>
                     </div>
                    <?php if(isset($_POST['maCBKH']))
                    {
                    ?>
                     <div layout="row">                    
                        <div flex="15">Chuyến bay chiều về:</div>                    
                        <div flex="20" style="font-weight:bold;">
                            <?php $tongve = $nguoiLon* $rowCBKH['donGia'] + 0.85 * $treEm * $rowCBKH['donGia']; echo number_format($tongve) ;?> VND     
                        </div>
                    </div>
                    <?php
                    }
                    ?> 
                    <div layout="row">
                        <div flex="15">Thuế VAT(10%):</div> 
                        <div flex="20" style="font-weight:bold;">
                            <?php $vat=0;
                             if(isset($_POST['maCBKH'])) 
                            {$vat= 0.1 * ($tongdi + $tongve); 
                            echo number_format($vat);} 
                             else {$vat = 0.1*$tongdi; echo number_format($vat);}?> VND     
                        </div> 
                    </div>
                    <div layout="row">
                        <div flex="15" style="font-weight:bold; text-transform:uppercase;">Tổng cộng:</div>                    
                        <div flex="20" style="font-weight:bold;">
                            <?php $tongcong=0; if(isset($_POST['maCBKH'])) 
                            {
                                $tongcong= $tongdi + $tongve +$vat;
                                echo number_format($tongcong);
                            }
                            else {
                                $tongcong = $tongdi + $vat;
                                echo number_format($tongcong);
                            }
                            ?> VND     
                        </div> 
                    </div>                                                        
                <!-- </div>  -->
            </div>         
        </div>          
    </div>
    </div>
    <!-- Kết thúc thông tin chuyến bay -->
    <!-- Thông tin hành khách: số lượng bn người: nl, te, ss -->
    <!-- Kết thúc thông tin hành khách -->
    <!-- Hiển thị thông tin người liên hệ -->
    <!-- Kết thúc thông tin người liên hệ -->
</form>
<?php
}
?>
