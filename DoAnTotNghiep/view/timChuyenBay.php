 <?php
     include "model/functionCommon.php";
?>             

 <script>
    // Hiển thị nơi đi theo nơi đến
        $(document).ready(function () {
            $("#tenSanBayDi").change(function () {
                var val = $(this).val();
                $.get("model/dsNoiDenTheoNoiDi.php", {tenSB: val}, function (data) {
                    // console.log("Hello");
                    $("#tenSanBayDen").html(data);
                });
            });

         //dùng để ẩn hiện ngày về theo loại hành trình  
         //Hiện tại vẫn có lỗi
            $("#idMotChieu").change(function () {
                // console.log("Hello Mot chieu");
                $("#ngayDen").remove();               
            });

            $("#idKhuHoi").change(function () {
                // console.log("Hello khu hoi");
                $("#divNgayVe").append('<input type="date" name="ngayDen" id="ngayDen" style="border-radius: 5px; width:160px;" required="required">');               
            });
        });
</script>
 <form action="luaChonCB.php" name="formTimKiem" method="GET">
    <h4 style="text-transform:uppercase; text-align:center;">Đặt vé máy bay</h4>
        <md-divider style="border-top-width: 3px !important;"></md-divider>
            <div style="padding-top:10px; padding-bottom: 10px;" style="height:10%;">                        
                Hành trình:
                <input type="radio" name="hanhTrinh" value="khuHoi" id="idKhuHoi" style="margin-left: 5px;"  checked>Khứ hồi
                <input type="radio" name="hanhTrinh" value="motChieu" id="idMotChieu" >Một chiều
            </div>
            <div layout="row" flex style="height:10%;">
            <div flex="50" layout="row">
                Điểm đi:                                        
                <select name="tenSanBayDi" id="tenSanBayDi" class="input-md form-control tt-input" 
                 style="width:60%; height: 36px; margin-bottom: 5px; margin-left: 5px;" required="required">
                    <option value="">Nơi đi</option>                    
                    <?php 
                    // $sql="SELECTa * FROM sanbay ORDER BY tenSanBay ASC ";
                    $rowsNoiDi=dsNoiDi();                    
                    while ($rowNoiDi=mysqli_fetch_array($rowsNoiDi)) 
                    {
                    ?>
                    <option value="<?php echo $rowNoiDi['noiDi']; ?>"><?php echo $rowNoiDi['noiDi']; ?></option>                       
                    <?php 
                    } ;
                    ?>
                </select>
            </div>
            <div flex layout="row">
                   Điểm đến: 
                    <!-- <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> -->
                 <select name="tenSanBayDen" id="tenSanBayDen" class="input-md form-control tt-input"
                style="width:60%; height: 36px; margin-bottom: 5px; margin-left: 5px;" required="required">
                    <option value="">Nơi đến</option>
                    <?php 
                    // $sql="SELECT * FROM sanbay ORDER BY tenSanBay ASC ";
                    $rowsNoiDen=dsNoiDen();                    
                    while ($rowNoiDen=mysqli_fetch_array($rowsNoiDen)) 
                    {
                     ?>
                    <option value="<?php echo $rowNoiDen['noiDen']; ?>"><?php echo $rowNoiDen['noiDen']; ?></option>                      
                    <?php 
                         } ;
                    ?>
                </select>
            </div>
            </div>
                    <!-- <div>
                    </div> -->
            <div layout="row" style="height:10%;">
                <div flex="50">
                    Ngày đi:                           
                        <input type="date" name="ngayDi" id="ngayDi" style="border-radius: 5px; width:160px;" required="required"
                         onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                </div>
                <div flex="50" id="divNgayVe">
                    Ngày về:                        
                       <input type="date" name="ngayDen" id="ngayDen" style="border-radius: 5px; width:160px;" required="required">                            
                </div>
            </div>
            <div layout="row" style="height:10%;">
               <div flex="33">
                    Người lớn
                    <br> (> 16 tuổi):                            
                       <select name="nguoiLon" id="nguoiLon" style="border-radius: 5px;" class="frm-field required">
                            <?php for($i=1; $i<= 6; $i++)
                                {
                            ?>
                                <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                </option>
                            <?php 
                                }
                            ?>   
                        </select>
                </div>
                 <div flex="33">
                    Trẻ em
                    <br> (2-16 tuổi):
                    <select name="treEm" id="treEm"  style="border-radius: 5px;" class="frm-field required">
                        <?php for($i=0; $i< 6; $i++)
                            {
                        ?>
                            <option value="<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </option>
                        <?php 
                            }
                        ?>   
                    </select>
                </div>
                <div flex>
                    Trẻ sơ sinh
                        <br>(< 2 tuổi):
                        <select name="treSoSinh" id="treSoSinh" style="border-radius: 5px;" class="frm-field required">
                            <?php for($i=0; $i< 6; $i++)
                                    {
                            ?>
                                <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                </option>
                            <?php 
                                }
                            ?>   
                        </select>
                </div>
                </div>
                    <!-- Hạng vé -->
                    <div layout="row">
                    Hạng vé:
                        <select name="hangVe" id="maHangVe"  style="border-radius: 5px; margin-left:5px; " class="frm-field required">
                            <!-- <option value="pt">Phổ thông</option> -->                            
                            <?php
                            $rowsHV=dsHangVe();
                            while ($rowHV=mysqli_fetch_array($rowsHV))
                            {
                            ?>
                                <option value="<?php echo $rowHV['maHangVe']; ?>"><?php echo $rowHV['tenHangVe'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                </div>
                <div style="text-align:center;">
                    <md-button class="md-raised;" style="background-color: rgb(63,81,181); color:white;" type="submit">Tìm chuyến bay</md-button>
                </div>
</form>