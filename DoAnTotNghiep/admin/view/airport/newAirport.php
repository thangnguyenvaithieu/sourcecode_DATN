<form action="airport.php?action=insert" method="POST" name="formNewAirport" enctype="multipart/form-data">                
        <div layout="column">                 
                <div id="divFocusNew">
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Mã sân bay:</label>
                                <input style="width: 500px;" required  name="maSanBay" ng-model="newAirport.maSanBay" maxlength="30"/>
                                <div ng-messages="formNewAirport.maSanBay.$error">
                                        <div ng-message-exp="['required','maxlength']" class="error-log">
                                                Yêu cầu nhập mã sân bay đầy đủ, độ dài tối đa 30 kí tự.
                                        </div>
                                </div>
                        </md-input-container>
                </div>

                <div>
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Tên sân bay:</label>
                                <input style="width: 500px;"  required name="tenSanBay" ng-model="newAirport.tenSanBay">
                                <div ng-messages="formNewAirport.tenSanBay.$error">
                                        <div ng-message="required" class="error-log">
                                                Yêu cầu nhập đầy đủ tên sân bay.                                              
                                        </div>
                                </div>
                        </md-input-container>                       
                </div>

                <div>
                    <label>Trạng thái:</label>
                    <input type="radio" name="trangThai"  value="1" checked>Hiện
                    <input type="radio" name="trangThai"  value="0">Ân                                             
                </div>

                <div class="row" layout-align="center center">
                        <md-button ng-disabled="formNewAirport.$invalid" type="submit"  name="submit" class="md-primary md-raised" style="font-weight:normal;">
                                    Lưu
                        </md-button>
                        <md-button class="md-primary md-raised" ng-click="resetNew()" style="font-weight:normal;" class="reset">
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
<hr style="width: 500px;">
