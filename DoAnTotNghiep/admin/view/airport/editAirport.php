<form action="airport.php?action=update&maSB=<?php echo $row['maSanBay']; ?>" method="POST" name="formEditAirport" id="resetFormEdit"  enctype="multipart/form-data">
        <div layout="column">
                <div>
                    <h4 style="text-transform: uppercase; text-align:center;">Sửa sân bay</h4>   
                </div>
                <div id="divFocusEdit">
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Mã sân bay:</label>
                                <input type="text" style="width: 500px;" required  name="maSanBay" id="maSanBay"  maxlength="30"  value="<?php echo $row['maSanBay'];?>" >
                                <div ng-messages="formEditAirport.maSanBay.$error">
                                        <div ng-message-exp="['required','maxlength']">
                                                Yêu cầu nhập mã sân bay đầy đủ, độ dài tối đa 30 kí tự.
                                        </div>
                                </div>
                        </md-input-container>
                </div>

                <div>
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Tên sân bay:</label>
                                <input type="text" style="width: 500px;"  required name="tenSanBay" id="tenSanBay" value="<?php echo $row['tenSanBay'];?>">
                                <div ng-messages="formEditAirport.tenSanBay.$error">
                                        <div ng-message="required">
                                                Yêu cầu nhập đầy đủ tên sân bay.                                              
                                        </div>                                        
                                </div>
                        </md-input-container>                       
                </div>

                <div>
                    <label>Trạng thái:</label>
                    <input type="radio" name="trangThai"  value="1" <?php if($row['trangThai']==1) echo "checked"; ?> >Hiện
                    <input type="radio" name="trangThai"  value="0" <?php if($row['trangThai']==0) echo "checked"; ?> >Ân                                             
                </div>

                <div class="row" layout-align="center center">
                        <md-button ng-disabled="formEditAirport.$invalid" type="submit"  name="submit" class="md-primary md-raised" style="font-weight:normal;">
                                    Lưu
                        </md-button>
                        <md-button class="md-primary md-raised"  id="resetEdit"  style="font-weight:normal;">
                                    Nhập lại
                        </md-button>  
                        <a href="airport.php">
                                <md-button class="md-primary md-raised" style="font-weight:normal;">
                                   Thoát 
                                </md-button> 
                        </a>                    
                </div>
        </div> 
</form>

