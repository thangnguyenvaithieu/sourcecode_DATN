<form action="doubleFlights.php?action=insert" method="POST" name="formNewDoubleFlights" enctype="multipart/form-data">                
        <div layout="column">                 
                <!-- <div>
                    Tên sân bay đi:
                        <md-input-container>
                            <label md-no-float> Nơi đi</label>
                            <md-select ng-model="formNewDoubleFlights.noiDi" name="noiDi" id="noiDi"  md-no-float  style="width:500px;">                                
                                <?php $sql="select * from sanbay";
                                       $rows=query($sql);
                                       while ($row=mysqli_fetch_array($rows)) {                                           
                                ?>
                                <md-option value="<?php echo $row['tenSanBay']; ?>" >
                                      <?php echo $row['tenSanBay']; ?>
                                </md-option> 
                                <?php
                                } 
                                ?>          
                              
                            </md-select>
                        </md-input-container>                        
                </div>

                <div>
                    Mã sân bay đi:
                        <md-input-container>
                            <label md-no-float>Mã sân bay đi</label>
                            <md-select ng-model="formNewDoubleFlights.maSanBayDi"  name="maSanBayDi" id="maSanBayDi" md-no-float style="width:500px;">                                
                                 <?php $sql="select * from sanbay";
                                       $rows=query($sql);
                                       while ($row=mysqli_fetch_array($rows)) {                                           
                                ?>
                                <md-option value="<?php echo $row['maSanBay']; ?>" >
                                      <?php echo $row['maSanBay']; ?>
                                </md-option> 
                                <?php
                                } 
                                ?> 
                            </md-select>
                        </md-input-container>                       
                </div>
                <div>
                    Tên sân bay đến:
                        <md-input-container>
                            <label md-no-float>Nơi đến</label>
                            <md-select ng-model="formNewDoubleFlights.noiDen" name="noiDen" id="noiDen" md-no-float style="width:500px;">                               
                                <?php $sql="select * from sanbay";
                                       $rows=query($sql);
                                       while ($row=mysqli_fetch_array($rows)) {                                           
                                ?>
                                <md-option value="<?php echo $row['tenSanBay']; ?>" >
                                      <?php echo $row['tenSanBay']; ?>
                                </md-option> 
                                <?php
                                } 
                                ?>                                  
                                </md-select>
                        </md-input-container>
                </div>

                <div>
                     Mã sân bay đến:
                         <md-input-container>
                            <label md-no-float>Mã sân bay đến</label>
                            <md-select ng-model="formNewDoubleFlights.maSanBayDen" name="maSanBayDen" id="maSanBayDen" md-no-float style="width:500px;">                                 
                                 <?php $sql="select * from sanbay";
                                       $rows=query($sql);
                                       while ($row=mysqli_fetch_array($rows)) {                                           
                                ?>
                                <md-option value="<?php echo $row['maSanBay']; ?>">
                                      <?php echo $row['maSanBay']; ?>
                                </md-option> 
                                <?php
                                } 
                                ?>                                  
                            </md-select>
                        </md-input-container>                       
                </div> -->
                <div layout="row" class="form-group">
                    <label flex="20">Sân bay đi: </label>
                    <div flex="80">
                            <select name="noiDi" id="noiDi" class="form-control" required>
                                <option value="">Nơi đi</option>
                                    <?php 
                                        $sql="select * from sanbay";
                                        $rows=query($sql);
                                    while ($row=mysqli_fetch_array($rows)) {                                           
                                    ?>
                                        <option value="<?php echo $row['tenSanBay']; ?>"><?php echo $row['tenSanBay']; ?></option>
                                    <?php
                                     }
                                     ?>
                            </select>
                    </div>
                </div>
                <div layout="row" class="form-group">
                        <label flex="20">Mã sân bay đi: </label>
                        <div flex="80">
                           <select name="maSanBayDi" id="maSanBayDi" class="form-control" required>
                                <option value="">None</option>
                                    <?php 
                                        $sql="select * from sanbay";
                                        $rows=query($sql);
                                    while ($row=mysqli_fetch_array($rows)) {                                           
                                        ?>
                                            <option value="<?php echo $row['maSanBay']; ?>"><?php echo $row['maSanBay']; ?></option>
                                    <?php
                                    } 
                                    ?>
                            </select>
                        </div>
                </div>

                <div layout="row" class="form-group">
                        <label flex="20">Sân bay đến: </label>
                        <div flex="80">
                            <select name="noiDen" id="noiDen" class="form-control" required>
                                <option value="">Nơi đến</option>
                                    <?php 
                                        $sql = "select * from sanbay";
                                        $rows = query($sql);
                                    while ($row = mysqli_fetch_array($rows)) {                                           
                                        ?>
                                            <option value="<?php echo $row['tenSanBay']; ?>"><?php echo $row['tenSanBay']; ?></option>
                                    <?php
                                     } 
                                     ?>
                            </select>
                        </div>
                </div>
                <div layout="row">
                        <label flex="20">Mã sân bay đến: </label>
                        <div flex="80">
                            <select name="maSanBayDen" id="maSanBayDen" class="form-control" required>
                                <option value="">None</option>
                                    <?php 
                                            $sql="select * from sanbay";
                                            $rows=query($sql);
                                           while ($row=mysqli_fetch_array($rows)) {                                           
                                    ?>
                                    <option value="<?php echo $row['maSanBay']; ?>"><?php echo $row['maSanBay']; ?></option>
                                    <?php
                                     } 
                                     ?>
                            </select>
                        </div>
                </div>       

                <div>
                        Mã tuyến bay:
                        <md-input-container>
                            <label md-no-float>Mã sân bay đi-Mã sân bay đến</label>
                            <input style="width: 500px;"  required name="maTuyenBay" id="maTuyenBay" ng-model="newDoubleFlights.maTuyenBay" style="width:500px;">
                            <div ng-messages="formNewDoubleFlights.maTuyenBay.$error">
                                <div ng-message="required" class="error-log">
                                    Yêu cầu nhập đầy đủ mã tuyến bay.                                              
                                 </div>
                            </div>
                        </md-input-container>                       
                </div>

                <div layout="row" class="form-group">
                    <label flex="20">Trạng thái:</label>
                    <div flex="80">
                        <input type="radio" name="trangThai"  value="1" checked>Hiện
                        <input type="radio" name="trangThai"  value="0">Ân 
                    </div>                                                                
                </div>

                <div class="row" layout-align="center center">
                        <md-button ng-disabled="formNewDoubleFlights.$invalid" type="submit"  name="submit" class="md-primary md-raised" style="font-weight:normal;">
                                    Lưu
                        </md-button>
                        <md-button class="md-primary md-raised" ng-click="resetNew()" style="font-weight:normal;" class="reset" type="reset">
                                    Nhập lại
                        </md-button>  
                        <a href="doubleFlights.php">
                                <md-button class="md-primary md-raised" style="font-weight:normal;">
                                   Thoát
                                </md-button>
                        </a>                     
                </div>
        </div>        
</form>
<hr style="width: 500px;">
