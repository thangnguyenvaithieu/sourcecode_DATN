<?php include "model/functionCommon.php" ?>
<style>
    .dong{
        display:inline;
    }
    .canle{
        float:right;
    }
</style>
<form  method="POST" action="tongket.php">
    <div layout="row">
        <div flex="10"></div>
        <!-- bảng lựa chọn chuyến bay -->
        <div flex="60" layout="column">
            <!--Thông tin hánh khách  -->            
            <!-- Thông tin người lớn -->
            <!-- <div style="text-transform:uppercase;">Thông tin hành khách</div>-->                                                               
            <fieldset style=" height: auto;">
                <legend style="font-size: 20px; font-weight: bold; border-bottom:2px solid #cdcdcd;">Thông tin hành khách</legend>
                            <!-- <legend>Thông tin người lớn</legend>  -->
                <div layout="row" style="margin-left: 10px; font-weight:bold;" >
                    <div flex="20">Hành khách</div>
                    <div flex="20">Quý danh</div>
                    <div flex="40">Họ tên</div>
                </div>
                            <!-- Thông tin người lớn -->
                            <!-- <div>Thông tin người lớn</div> -->
                <?php 
                    if(isset($_GET['nguoiLon']))
                    $nguoiLon = $_GET['nguoiLon'];
                    $i=0; 
                    while($i < $nguoiLon)
                    {
                    ?>
                    <div layout="row" style="margin-left: 10px;">
                        <div flex="20">Người lớn</div>
                        <div flex="20">
                            <select name="gioiTinhHK[]" required  class="form-control" style="width: 90px; text-align:left;">
                                <option value=""></option>                                    
                                <option value="1">Ông</option>
                                <option value="0">Bà</option>
                            </select>
                        </div>
                            <div flex="40" class="form-group">                                   
                                <input type="text"  name="hoTenHK[]"  class="form-control" required  >
                            </div>
                        </div>
                    <?php 
                        $i++;
                        } 
                    ?>
                    <!--Thông tin người lớn  -->
                    <!-- Thông tin trẻ em -->
                <?php 
                        if(isset($_GET['treEm']))
                        $treEm = $_GET['treEm'];
                        $i = 0; 
                        while($i < $treEm)
                        {
                ?>
                    <div layout="row" style="margin-left: 10px;">
                        <div flex="20">Trẻ em</div>
                        <div flex="20">
                            <select name="gioiTinhTE[]" id="gioiTinhTE" required class="form-control" style="width: 90px; text-align:left;"   >
                                <option value=""></option>                                        
                                <option value="1">Trai</option>
                                <option value="0">Gái</option>
                            </select>
                        </div>
                        <div flex="40" class="form-group">                                    
                            <input type="text"  name="hoTenTE[]" id="hoTenTE" required class="form-control"  >  
                            </div>
                        </div>
                <?php 
                    $i++;
                    } 
                ?>
                <!-- Kết thúc thông tin trẻ em -->
                <!-- Thông tin trẻ sơ sinh -->
                <?php 
                    if(isset($_GET['treSoSinh']))
                            $treSoSinh = $_GET['treSoSinh'];
                                $i=1; 
                                while($i<=$treSoSinh)
                                {
                                ?>
                                <div layout="row" style="margin-left: 10px;">
                                    <div flex="20">Trẻ sơ sinh</div>
                                    <div flex="20">
                                        <select name="gioiTinhTSS[]" id="gioiTinhTSS" required class="form-control" style="width: 90px; text-align:left;"  >
                                            <option value=""></option>
                                            <option value="1">Trai</option>
                                            <option value="0">Gái</option>
                                        </select>
                                    </div>
                                    <div flex="40" class="form-group">                                    
                                        <input type="text"  name="hoTenTSS[]" id="hoTenTSS[]" required class="form-control"  > 
                                    </div>
                                </div>
                                <?php 
                                $i++;
                                } 
                                ?>
                            <!-- Kết thúc thông tin trẻ sơ sinh -->
                        </fieldset> 
            <!-- Kết thúc thông tin hành khách -->
            <!-- Thông tin hành lý -->        
                <fieldset style=" height: auto;">
                    <legend style="font-size: 20px; font-weight: bold; border-bottom:2px solid #cdcdcd;">Thông tin hành lý</legend>
                        <table width="100%" cellpadding="0" cellspacing="0" style="padding:15px">
                            <tbody>
                                <tr>
                                <td colspan="2">
                                        <span style="font-size: 14px;  width: 140px;  display: block;  text-transform: uppercase;">Hành lý chiều đi</span>
                                </td>
                                    <td colspan="2">
                                        <span>Mỗi hành khách đươc mang theo tối đa 7Kg hành lý ký gởi</span><br><span>Mỗi hành khách được mang theo tối đa 7kg hành lý xách tay</span><br>
                                    </tr>
                            </tbody>
                        </table>
                </fieldset>

            <!-- <hr> -->
            <!-- Thông tin người liên hệ -->     
                 <!--Khi đã đăng nhập -->
                 <?php if(isset($_SESSION['email']))
                 {?>
                    <input type="hidden" name="hoTenNLH" value="<?php echo $_SESSION['hoTen'];?>">
                    <input type="hidden" name="gioiTinhNLH" value="<?php echo $_SESSION['gioiTinh'];?>">
                    <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
                    <input type="hidden" name="soDienThoai" value="<?php echo $_SESSION['soDienThoai'];?>">
                 <?php
                 }
                  ?>
                <input type="hidden" name="hoTenNLH" value="<?php if(isset($_SESSION['hoTen'])) {echo $_SESSION['hoTen'];} ?>" >
                <fieldset style=" height: auto;">
                    <legend style="font-size: 20px; font-weight: bold; border-bottom:2px solid #cdcdcd;">Thông tin người liên hệ</legend>
                        <div layout="row" class="form-group">
                        <div flex="10"><label>Họ tên:</label></div> 
                        <div flex="60">
                            <input type="text" class="form-control" id="hoTenNLH" required  name="hoTenNLH" value="<?php if(isset($_SESSION['hoTen'])) {echo $_SESSION['hoTen'];} ?>" <?php if(isset($_SESSION['hoTen'])) echo 'disabled'; ?> >
                        </div>
                            <div style="margin-left:10px;"><label>Quý danh:</label></div> 
                        <div>
                                <select name="gioiTinhNLH" id="gioiTinhNLH" required class="form-control" style="width: 90px; text-align:left;" <?php if(isset($_SESSION['gioiTinh'])) echo 'disabled'; ?>>        
                                    <option value=""></option>                                    
                                    <option value="1" <?php if(isset($_SESSION['gioiTinh'])) {echo $_SESSION['gioiTinh'] == 1 ? 'selected' : ''; }?>>Ông</option>
                                    <option value="0" <?php if(isset($_SESSION['gioiTinh'])) {echo $_SESSION['gioiTinh'] == 0 ? 'selected' : ''; }?>>Bà</option>                                     
                                </select>                            
                        </div>
                        </div>
                        <div layout="row"  class="form-group">
                            <div flex="10">
                                <label>Email:</label>
                            </div> 
                            <div flex="60">
                            <input type="text" class="form-control" required  name="email" id="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>" <?php if(isset($_SESSION['email'])) echo 'disabled'; ?> >                           
                            </div>
                        </div>
                        <div layout="row"  class="form-group">
                            <div flex="10">
                                <label>Điện thoại:</label>                            
                            </div>
                            <div flex="60">
                                <input type="text" class="form-control" required name="soDienThoai" id="soDienThoai" value="<?php if(isset($_SESSION['soDienThoai'])) echo $_SESSION['soDienThoai'];?>" <?php if(isset($_SESSION['soDienThoai']))  echo 'disabled'; ?>   >                            
                            </div>
                        </div>                    
                </fieldset>
            
            <!-- Kết thúc thông tin người liên hệ -->

                <div layout="row" layout-align="end center">
                    <md-button class="md-raised;" style="background-color: rgb(63,81,181); color:white;" type="submit" name="datve">Đặt vé</md-button>
                </div>
            </div>
            <!-- Bảng tổng giá vé theo chuyến bay được chon -->
            <?php
                if(isset($_GET['hanhTrinh']))
                {
                    $hanhTrinh=$_GET['hanhTrinh'];
                }
                if(isset($_GET['1Cchecked']))
                {
                  $maCB1C = $_GET['1Cchecked'];                     
                }
                if(isset($_GET['hangVe']))
                {
                   $hangVe=$_GET['hangVe'];                    
                }
                $rowsCT1C=layCTCB($maCB1C,$hangVe);
                $rowCT1C=mysqli_fetch_array($rowsCT1C);  

                if(isset($_GET['KHchecked']))
                {
                    $maCBKH=$_GET['KHchecked'];  
                    $rowsCTKH=layCTCB($maCBKH,$hangVe);
                    $rowCTKH=mysqli_fetch_array($rowsCTKH);                       
                }             
                                        
            ?> 
            <input type="hidden" name="hangVe" value="<?php echo $hangVe; ?>">           
            <input type="hidden" name="hanhTrinh" value="<?php echo $hanhTrinh;?>">            
            <input type="hidden" name="maCB1C" value="<?php echo $maCB1C;?>">
            <?php if(isset($_GET['KHchecked'])){?>
            <input type="hidden" name="maCBKH" value="<?php echo $maCBKH;?>">
            <?php } ?>           
                
            <div layout="column" flex="20"  layout-align="center start" style="margin-left:20px;">
                <div>
                     <label style="font-weight:bold; font-size:16px; text-transform:uppercase;  text-decoration: underline;">Tóm tắt thông tin</label>
                </div>
                    <div>
                            <span style="text-align:left;">Loại vé:
                            <?php 
                                if ($_GET['hanhTrinh']=="khuHoi")
                            { ?>
                                <span style="text-align:left;"> Khứ hồi</span>
                            <?php
                            } 
                            else
                            { 
                            ?>
                                <span style="text-align:left;">Một chiều</span>
                            </span>
                            <?php
                            } 
                            ?>              
                    </div>
                    <div>
                        CHUYẾN ĐI
                    </div>            
                    <div>
                        <label>Giá vé(chưa bao gồm thuế phí)</label>
                        <div>
                            <span><?php echo $nguoiLon; ?></span>
                            <input type="hidden" name="nguoiLon" value="<?php echo $nguoiLon; ?>">
                            <div class="dong">Người lớn:</div>
                            <div class="dong canle">
                                <span><?php echo $nguoiLon ."x". number_format($rowCT1C['donGia']); ?></span> VNĐ
                            </div>
                        </div>
                        <div>
                            <span><?php echo $treEm;?></span>
                            <input type="hidden" name="treEm" value="<?php echo  $treEm ; ?>">
                            <div class="dong">Trẻ em:</div>
                            <div class="dong canle">
                                <span><?php echo $treEm ."x". number_format(0.85 * $rowCT1C['donGia']); ?></span> VNĐ
                            </div>
                        </div>
                        <div>
                            <span><?php echo $treSoSinh; ?></span>
                            <input type="hidden" name="treSoSinh" value="<?php echo $treSoSinh; ?>">
                            <div class="dong">Sơ sinh:</div>
                            <div class="dong canle">
                                <span><?php echo $treSoSinh ."x 0";?></span> VNĐ
                            </div>
                        </div>
                        <div>
                            <div class="dong" style="font-weight:bold;">
                                Tổng giá tiền
                            </div>            
                            <div class="dong canle" style="font-weight:bold;">
                                <span style="display: inline" id="tongdi"></span>
                                <?php echo number_format(($nguoiLon*$rowCT1C['donGia'] + $treEm*0.85*$rowCT1C['donGia']));?> VNĐ
                            </div>
                        </div>         
                    </div>
                    <?php if($_GET['hanhTrinh']=="khuHoi")
                    {
                    ?>
                    <hr style="width:auto solid black; height:5px; "/>                    
                    <div>
                        CHUYẾN VỀ
                    </div>            
                    <div>
                        <label>Giá vé(chưa bao gồm thuế phí)</label>
                        <div>
                            <span><?php echo $nguoiLon; ?></span>
                            <div class="dong">Người lớn:</div>
                            <div class="dong canle">
                                <span><?php echo $nguoiLon ."x". number_format($rowCTKH['donGia']); ?></span> VNĐ
                            </div>
                        </div>
                        <div>
                            <span><?php echo $treEm;?></span>
                            <div class="dong">Trẻ em:</div>
                            <div class="dong canle">
                                <span><?php echo $treEm ."x". number_format(0.85 * $rowCTKH['donGia']); ?></span> VNĐ
                            </div>
                        </div>
                        <div>
                            <span><?php echo $treSoSinh; ?></span>
                            <div class="dong">Sơ sinh:</div>
                            <div class="dong canle">
                                <span><?php echo $treSoSinh ."x 0";?></span> VNĐ
                            </div>
                        </div>
                        <div>
                            <div class="dong" style="font-weight:bold;">
                                Tổng giá tiền
                            </div>            
                            <div class="dong canle" style="font-weight:bold;">
                                <span style="display: inline" id="tongdi"></span>
                                <?php echo number_format(($nguoiLon*$rowCTKH['donGia'] + $treEm*0.85*$rowCTKH['donGia']));?> VNĐ
                            </div>
                        </div>         
                    </div>
                    <?php
                    }
                    ?> 
                    <hr>                  
                    <div>
                        <div class="dong" style="text-transform:uppercase; font-size:16px; font-weight:bold;">
                            Tổng cộng:
                        </div>            
                        <div class="dong canle" style="font-weight:bold;">
                            <span style="display: inline" id="tongcong"></span>
                            <?php if(!isset($_GET['KHchecked'])) echo number_format(($nguoiLon*$rowCT1C['donGia'] + $treEm*0.85*$rowCT1C['donGia'])); else {echo number_format($nguoiLon*($rowCT1C['donGia']+$rowCTKH['donGia'])+0.85*$treEm*($rowCT1C['donGia']+$rowCTKH['donGia']));} ;?> VNĐ
                        </div>
                    </div>                             
            </div>
            <!-- Kết thúc bảng tổng giá vé theo chuyến bay được chon-->
            <div flex="10"></div>
        </div> 
</form>
   
