<form action="register.php" method="POST" name="formRegister">
        <div layout="column">
                <div>
                    <h4 style="text-transform: uppercase; text-align:center;">Đăng kí thành viên</h4>
                </div>
                 <div id="divFocus">
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Họ và tên:</label>
                                <input style="width: 500px;" type="text" required name="txthoten" ng-model="register.txthoten">
                                <div ng-messages="formRegister.txthoten.$error">
                                        <div ng-message="required" class="error-log">
                                                Yêu cầu nhập đầy đủ họ tên.
                                        </div>
                                </div>
                        </md-input-container>
                </div>
                 <div>
                        <!-- <md-radio-group ng-model="register.gioitinh" layout="row" name="gioiTinh">
                            Giới tính:
                            <md-radio-button value="1"  class="md-primary" style="margin-left: 5px;">Nam</md-radio-button>
                            <md-radio-button value="0"  class="md-primary">Nữ</md-radio-button>
                        </md-radio-group>  -->
                          <label>Giới tính:</label>
                        <input type="radio" name="gioiTinh" value="1" checked>Nam
                        <input type="radio" name="gioiTinh" value="0">Nữ                         
                </div>
                <div>
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Số điện thoại:</label>
                                <input style="width: 500px;" type="text" maxlength="12" required name="txtsodienthoai" ng-model="register.txtsodienthoai">
                                <div ng-messages="formRegister.txtsodienthoai.$error">
                                        <div ng-message-exp="['required','maxlength']" class="error-log">
                                                Yêu cầu nhập đầy đủ số điện thoại, có độ dài tối đa 12 kí tự.
                                        </div>
                                </div>
                        </md-input-container>
                </div>
                <div>
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Email:</label>
                                <input style="width: 500px;" required type="email" name="txtemail" ng-model="register.txtemail"
                                        minlength="10" maxlength="100" ng-pattern="/^.+@.+\..+$/"/>
                                <div ng-messages="formRegister.txtemail.$error" role="alert">
                                        <div ng-message-exp="['required', 'minlength', 'maxlength', 'pattern']" class="error-log">
                                                Yêu cầu nhập email đầy đủ,có độ dài từ 10 đến 100 kí tự.
                                        </div>
                                </div>
                        </md-input-container>
                </div>
                <div>
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Password:</label>
                                <input style="width: 500px;" type="password" required name="txtpassword" ng-model="register.txtpassword">
                                <div ng-messages="formRegister.txtpassword.$error" >
                                        <div ng-message="required" class="error-log">
                                                Yêu cầu nhập đầy đủ password.
                                        </div>
                                </div>
                        </md-input-container>
                </div>
                <div class="row" layout-align="center center">
                        <md-button ng-disabled="formRegister.$invalid" type="submit"  name="submit" class="md-primary md-raised">
                                    Đăng kí
                        </md-button>
                        <md-button class="md-primary md-raised" ng-click="reset()">
                                    Nhập lại
                        </md-button>
                </div>
        </div>
</form>
<?php               
    if(isset($_POST['submit']))
     {

         $email=$_POST['txtemail'];
         $email = strip_tags($email);
         $email = addslashes($email);

         $password=$_POST['txtpassword'];
         $password=strip_tags($password);
         $password=addslashes($password);
         $password=md5($password);

         $hoTen=$_POST['txthoten'];
         $gioiTinh=$_POST['gioiTinh'];

         $soDienThoai=$_POST['txtsodienthoai'];

         if($email=="" || $password=="" || $hoTen=="" || $soDienThoai=="" || $gioiTinh=="")
         {
             echo '<script language="javascript">';
                echo 'toastr.warning("Nhập đầy đủ các trường bắt buộc!")';
             echo '</script>';
         }
         else {
                $sql="INSERT INTO `users` (`hoTen`, `password`, `gioiTinh`, `soDienThoai`, `thuocNhom`, `email`)
                 VALUES ( '$hoTen', '$password', '$gioiTinh', '$soDienThoai', '0', '$email')";                 
                $rows=query($sql); 
                echo '<script language="javascript">';
                          echo 'toastr.success("Đăng kí thành công.")';
                echo '</script>';
                // echo $sql;

         }
     }
?>