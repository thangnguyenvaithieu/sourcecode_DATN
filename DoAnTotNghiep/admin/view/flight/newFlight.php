<div style="background:white;">
    <form action="flight.php?action=insert" method="POST" name="formNewFlight">                
            <div layout="column">
                    <div layout="row" class="form-group">
                        <label flex="20">Hãng máy bay: </label>
                        <div flex="80">
                                <select name="maHangMayBay" id="maHangMayBay" class="form-control" required>
                                    <option value="">Tên hãng(Mã hãng)</option>
                                        <?php 
                                            $sql="select * from hangMayBay";
                                            $rows=query($sql);
                                        while ($row=mysqli_fetch_array($rows)) {                                           
                                        ?>
                                            <option value="<?php echo $row['maHangMayBay']; ?>"><?php echo $row['tenHangMayBay'];?>(<?php echo $row['maHangMayBay']; ?>)</option>
                                        <?php
                                        }
                                        ?>
                                </select>
                        </div>
                    </div>               
                    <div>
                        Mã chuyến bay:
                        <md-input-container>
                            <label md-no-float>Mã chuyến bay( Mã hãng + số hiệu) </label>
                            <input style="width: 500px; margin-left:5px;"  required name="maChuyenBay" id="maChuyenBay" ng-model="newFlight.maChuyenBay">
                            <div ng-messages="formNewFlight.maChuyenBay.$error">
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
                                            $sql = "select * from tuyenbay";
                                            $rows = query($sql);
                                        while ($row = mysqli_fetch_array($rows)) {                                           
                                            ?>
                                                <option value="<?php echo $row['maTuyenBay']; ?>"><?php echo $row['maTuyenBay']; ?>( <?php echo $row['noiDi']; ?> - <?php echo $row['noiDen']; ?> )</option>
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
                                    <option value="">Mã hạng vé( Tên hạng vé )</option>
                                        <?php 
                                            $sql = "select * from hangve";
                                            $rows = query($sql);
                                        while ($row = mysqli_fetch_array($rows)) {                                           
                                            ?>
                                                <option value="<?php echo $row['maHangVe']; ?>"><?php echo $row['maHangVe']; ?>(<?php echo $row['tenHangVe']; ?>)</option>
                                        <?php
                                        } 
                                        ?>
                                </select>
                            </div>
                    </div>                
                    <div>
                    <label style="width: 120px;">Giá vé:</label>                 
                        <md-input-container>                        
                            <input style="width: 450px; margin-left:5px;"  required name="donGia" id="donGia" ng-model="newFlight.donGia">
                            <div ng-messages="formNewFlight.donGia.$error">
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
                            <input type="date" style="width: 500px;" name="ngayKhoiHanh" required>
                        </div>
                    </div>
                    <div layout="row" class="form-group">
                        <label flex="20">Ngày đến:</label> 
                        <div flex="80">
                            <input type="date" style="width: 500px;" name="ngayDen" required>
                        </div>
                    </div>
                    <div layout="row" class="form-group">
                        <label flex="20">Giờ khởi hành:</label> 
                        <div flex="80">
                            <input type="time" style="width: 500px;" name="gioKhoiHanh" required>
                        </div>
                    </div> 
                    <div layout="row" class="form-group">
                        <label flex="20">Giờ đến:</label> 
                        <div flex="80">
                            <input type="time" style="width: 500px;" name="gioDen" required>
                        </div>
                    </div>
                                
                    <div layout="row" class="form-group">
                        <label flex="20">Trạng thái:</label>
                        <div flex="80">
                            <input type="radio" name="trangThai"  value="1" checked>Hiện
                            <input type="radio" name="trangThai"  value="0">Ân
                        </div>                                                                 
                    </div>
                    <div class="row" layout-align="center center">
                            <md-button ng-disabled="formNewFlight.$invalid" type="submit"  name="submit" class="md-primary md-raised" style="font-weight:normal;">
                                        Lưu
                            </md-button>
                            <md-button class="md-primary md-raised" ng-click="resetNew()" style="font-weight:normal;" class="reset" type="reset">
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