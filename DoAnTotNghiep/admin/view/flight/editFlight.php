<!-- 16/12 Dang lam phan sua chuyen bay-->
<div style="background:white;">
    <form action="flight.php?action=update&maCB=<?php echo $row['maChuyenBay']; ?>" method="POST" name="formEditFlight">                
            <div layout="column">
                    <div layout="row" class="form-group">
                        <label flex="20">Hãng máy bay: </label>
                        <div flex="80">
                                <select name="maHangMayBay" id="maHangMayBay" class="form-control" required>
                                    <option value="">Tên hãng(Mã hãng)</option>
                                        <?php 
                                            $sql="select * from hangMayBay";
                                            $rows=query($sql);
                                        while ($rowHMB=mysqli_fetch_array($rows))
                                        {
                                                if($rowHMB['maHangMayBay']==$row['maHangMayBay'])
                                            {                                           
                                            ?>
                                                <option value="<?php echo $rowHMB['maHangMayBay']; ?>" selected="selected" ><?php echo $rowHMB['tenHangMayBay'];?>(<?php echo $rowHMB['maHangMayBay']; ?>)</option>

                                            <?php
                                            } 
                                            else
                                            {
                                            ?>
                                                <option value="<?php echo $rowHMB['maHangMayBay']; ?>"><?php echo $rowHMB['tenHangMayBay'];?>(<?php echo $rowHMB['maHangMayBay']; ?>)</option>                                            
                                            <?php 
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                </select>
                        </div>
                    </div>               
                    <div>
                        Mã chuyến bay:
                        <md-input-container id="inputMaChuyenBay">
                            <label md-no-float>Mã chuyến bay( Mã hãng + số hiệu) </label>
                            <input style="width: 500px; margin-left:5px;"  required name="maChuyenBay" id="maChuyenBay"  value="<?php echo $row['maChuyenBay']; ?>">
                            <div ng-messages="formEditFlight.maChuyenBay.$error">
                                <div ng-message="required" class="error-log">
                                    Yêu cầu nhập đầy đủ mã chuyến bay.                                              
                                </div>
                            </div>
                        </md-input-container>                       
                    </div>
                    <div layout="row" class="form-group">
                            <label flex="20">Mã tuyến bay: </label>
                            <div flex="80">
                                <select name="maTuyenBay" id="maTuyenBay" class="form-control" required>
                                    <option value="">Mã tuyến bay( Nơi đi-Nơi đến )</option>
                                        <?php 
                                            $sqlTB = "select * from tuyenbay";
                                            $rowsTB = query($sqlTB);
                                        while ($rowTB = mysqli_fetch_array($rowsTB))
                                        {
                                                if($rowTB['maTuyenBay']==$row['maTuyenBay'])
                                                {                                           
                                                ?>
                                                    <option value="<?php echo $rowTB['maTuyenBay']; ?>" selected="selected"><?php echo $rowTB['maTuyenBay']; ?>( <?php echo $rowTB['noiDi']; ?> - <?php echo $rowTB['noiDen']; ?> )</option>
                                                <?php
                                                }
                                                else 
                                                {
                                                ?>                                       
                                                    <option value="<?php echo $rowTB['maTuyenBay']; ?>"><?php echo $rowTB['maTuyenBay']; ?>( <?php echo $rowTB['noiDi']; ?> - <?php echo $rowTB['noiDen']; ?> )</option>
                                                <?php                                              
                                                }
                                                ?>    
                                        <?php
                                        } 
                                        ?>
                                </select>
                            </div>
                    </div>
                    <div layout="row" class="form-group">
                            <label flex="20">Mã hạng vé: </label>
                            <div flex="80">
                                <select name="maHangVe" id="maHangVe" class="form-control" required>
                                    <!-- <option value="">Mã hạng vé( Tên hạng vé )</option> -->
                                        <!-- <?php 
                                            $sql = "select * from hangve";
                                            $rows = query($sql);
                                        while ($rowHV = mysqli_fetch_array($rows)) {                                           
                                            ?>
                                                <option value="<?php echo $rowHV['maHangVe']; ?>"><?php echo $rowHV['maHangVe']; ?>(<?php echo $rowHV['tenHangVe']; ?>)</option>
                                        <?php
                                        } 
                                        ?> -->
                                        <!--Hiển thị các hạng vé từ bảng hangve_chuyenbay -->
                                        <?php
                                            $sql="SELECT hvcb.maHangVe, hv.tenHangVe
                                            FROM hangve_chuyenbay as hvcb join hangve as hv on hvcb.maHangVe=hv.maHangVe
                                            WHERE maChuyenBay='$row[maChuyenBay]'";
                                            $rowsHV=query($sql);
                                            while ($rowHV=mysqli_fetch_array($rowsHV)) 
                                            {
                                        ?>
                                                <option value="<?php echo $rowHV['maHangVe']; $mahv=$rowHV['maHangVe']; ?>"><?php echo $rowHV['maHangVe']; ?>(<?php echo $rowHV['tenHangVe']; ?>)</option>                                                
                                        <?php
                                            }
                                        ?>                                        
                                </select>
                            </div>
                    </div>                
                    <div>
                    <!-- Lấy giá vé theo mã hạng vé và mã chuyến bay -->
                    <label style="width: 120px;">Giá vé:</label>                 
                        <md-input-container id="idInputDonGia">                        
                            <input style="width: 450px; margin-left:5px;" required  name="donGia" id="donGia"  value="<?php echo $row['donGia']; ?>" >
                            <div ng-messages="formEditFlight.donGia.$error">
                                <div ng-message="required" class="error-log">
                                    Yêu cầu nhập đầy đủ mã chuyến bay.                                              
                                </div>
                            </div>
                        </md-input-container>
                        <label>VND</label>                       
                    </div>
                    </div>
                    <div layout="row" class="form-group">
                        <label flex="20">Ngày khởi hành:</label> 
                        <div flex="80">
                            <input type="date" style="width: 500px;" required name="ngayKhoiHanh" id="ngayKhoiHanh" value="<?php echo $row['ngayKhoiHanh']; ?>">
                        </div>
                    </div>
                    <div layout="row" class="form-group">
                        <label flex="20">Ngày đến:</label> 
                        <div flex="80">
                            <input type="date" style="width: 500px;" required name="ngayDen" id="ngayDen" value="<?php echo $row['ngayDen']; ?>">
                        </div>
                    </div>
                    <div layout="row" class="form-group">
                        <label flex="20">Giờ khởi hành:</label> 
                        <div flex="80">
                            <input type="time" style="width: 500px;" required name="gioKhoiHanh" id="gioKhoiHanh" value="<?php echo $row['gioKhoiHanh']; ?>">
                        </div>
                    </div> 
                    <div layout="row" class="form-group">
                        <label flex="20">Giờ đến:</label> 
                        <div flex="80">
                            <input type="time" style="width: 500px;" required name="gioDen" id="gioDen" value="<?php echo $row['gioDen']; ?>">
                        </div>
                    </div>
                                
                    <div layout="row" class="form-group">
                        <label flex="20">Trạng thái:</label>
                        <div flex="80">
                            <input type="radio" name="trangThai"  value="1" <?php if($row['trangThai']=="1") echo "checked"; ?>>Hiện
                            <input type="radio" name="trangThai"  value="0" <?php if($row['trangThai']=="0") echo "checked"; ?>>Ân
                        </div>                                                                 
                    </div>
                    <div class="row" layout-align="center center">
                            <md-button ng-disabled="formEditFlight.$invalid" type="submit"  name="submit" class="md-primary md-raised" style="font-weight:normal;">
                                        Lưu
                            </md-button>
                            <md-button class="md-primary md-raised" ng-click="resetEdit()" style="font-weight:normal;" class="reset" type="reset">
                                        Nhập lại
                            </md-button>  
                            <a href="flight.php">
                                    <md-button class="md-primary md-raised" style="font-weight:normal;">
                                    Thoát
                                    </md-button>
                            </a>                     
                    </div>
            </div>        
    </form> 
    <hr style="width: 500px;">
</div>