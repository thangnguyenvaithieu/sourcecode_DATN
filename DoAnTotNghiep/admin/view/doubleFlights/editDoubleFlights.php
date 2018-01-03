<form action="doubleFlights.php?action=update&maTB=<?php echo $row['maTuyenBay'];?>&maSBDiCu=<?php echo $maSanBayDiCu; ?>&maSBDenCu=<?php echo $maSanBayDenCu;?>" method="POST" name="formEditDoubleFlights" id="formEditDoubleFlights">                
        <div layout="column">             
                <div layout="row" class="form-group">
                    <label flex="20">Sân bay đi: </label>
                    <div flex="80">
                            <select name="noiDi" id="noiDi" class="form-control" required>
                                <option value="">Nơi đi</option>
                                    <?php 
                                        $sql="select * from sanbay";
                                        $rows=query($sql);
                                    while ($rowSanBay=mysqli_fetch_array($rows)) 
                                    {
                                        if ($rowSanBay['tenSanBay']==$row['noiDi']) 
                                            {                      
                                                                                   
                                        ?>
                                        <option value="<?php echo $rowSanBay['tenSanBay']; ?>" selected="selected"><?php echo $rowSanBay['tenSanBay']; ?></option>
                                        <?php 
                                            } 
                                            else 
                                            {?> 
                                        <option value="<?php echo $rowSanBay['tenSanBay']; ?>"><?php echo $rowSanBay['tenSanBay']; ?></option>                                                                               
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
                        <label flex="20">Mã sân bay đi: </label>
                        <div flex="80">
                           <select name="maSanBayDi" id="maSanBayDi" class="form-control" required> 
                                <option value="">None</option>
                                    <?php 
                                        $sql="select * from sanbay";
                                        $rows=query($sql);               
                                                                
                                       
                                    while ($rowSanBay=mysqli_fetch_array($rows)) 
                                    {  
                                        if ($rowSanBay['maSanBay']==$maSanBayDiCu) 
                                        {
                                            // $maSBDiCu=$rowSanBay['maSanBay'];
                                        ?>
                                            <option value="<?php echo $rowSanBay['maSanBay']; ?>" selected="selected"><?php echo $rowSanBay['maSanBay']; ?></option>
                                        <?php                                                 
                                        }
                                        else
                                        {
                                         ?>
                                            <option value="<?php echo $rowSanBay['maSanBay']; ?>"><?php echo $rowSanBay['maSanBay']; ?></option>
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
                        <label flex="20">Sân bay đến: </label>
                        <div flex="80">
                            <select name="noiDen" id="noiDen" class="form-control" required>
                                <option value="">Nơi đến</option>
                                    <?php 
                                        $sql="select * from sanbay";
                                        $rows=query($sql);
                                    while ($rowSanBay=mysqli_fetch_array($rows)) 
                                    {
                                        if ($rowSanBay['tenSanBay']==$row['noiDen']) 
                                        {                   
                                                                                   
                                        ?>
                                        <option value="<?php echo $rowSanBay['tenSanBay']; ?>" selected="selected"><?php echo $rowSanBay['tenSanBay']; ?></option>
                                        <?php 
                                            } 
                                            else 
                                            {?> 
                                        <option value="<?php echo $rowSanBay['tenSanBay']; ?>"><?php echo $rowSanBay['tenSanBay']; ?></option>                                                                               
                                        <?php 
                                        } 
                                        ?>
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
                                       
                                    while ($rowSanBay=mysqli_fetch_array($rows)) 
                                    {  
                                        if ($rowSanBay['maSanBay']==$maSanBayDenCu) 
                                        {
                                            // $maSBDenCu=$rowSanBay['maSanBay'];
                                        ?>
                                            <option value="<?php echo $rowSanBay['maSanBay']; ?>" selected="selected"><?php echo $rowSanBay['maSanBay']; ?></option>
                                        <?php                                                 
                                        }
                                        else
                                        {
                                         ?>
                                            <option value="<?php echo $rowSanBay['maSanBay']; ?>"><?php echo $rowSanBay['maSanBay']; ?></option>
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
                        Mã tuyến bay:
                        <md-input-container>
                            <label md-no-float>Mã sân bay đi-Mã sân bay đến</label>
                            <input style="width: 500px;"  required name="maTuyenBay"  style="width:500px;" value="<?php echo $row['maTuyenBay']; ?>">
                            <div ng-messages="formEditDoubleFlights.maTuyenBay.$error">
                                <div ng-message="required" class="error-log">
                                    Yêu cầu nhập đầy đủ mã tuyến bay.                                              
                                 </div>
                            </div>
                        </md-input-container>                       
                </div>

                <div>
                    <label>Trạng thái:</label>
                    <input type="radio" name="trangThai"  value="1"  <?php if($row['trangThai']==1) echo "checked"; ?>>Hiện
                    <input type="radio" name="trangThai"  value="0"  <?php if($row['trangThai']==0) echo "checked"; ?>>Ân                                             
                </div>

                <div class="row" layout-align="center center">
                        <md-button ng-disabled="formEditDoubleFlights.$invalid" type="submit"  name="submit" class="md-primary md-raised" style="font-weight:normal;">
                                    Lưu
                        </md-button>
                        <md-button class="md-primary md-raised" ng-click="resetEdit()" style="font-weight:normal;" class="reset" type="reset">
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