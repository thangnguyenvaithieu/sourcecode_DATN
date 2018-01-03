 <form action="login.php" method="POST" name="formLogin">                
         <div layout="column">
                <div>
                    <h4 style="text-transform: uppercase; text-align:center;">Đăng nhập</h4>   
                </div>  
                <div id="divFocus">
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;">Nhập Email:</label>
                                <input style="width: 500px;" required type="email" name="txtemail" ng-model="login.txtemail" 
                                        minlength="10" maxlength="100" ng-pattern="/^.+@.+\..+$/" <?php if(isset($_SESSION['email'])) echo "value=".$_SESSION['email']; ?> />
                                <div ng-messages="formLogin.txtemail.$error" role="alert">
                                        <div ng-message-exp="['required', 'minlength', 'maxlength', 'pattern']" class="error-log">
                                                Yêu cầu nhập email đầy đủ,có độ dài từ 10 đến 100 kí tự.
                                        </div>
                                </div>
                        </md-input-container>
                </div>

                <div>
                        <md-input-container class="md-block">
                                <label style="font-weight:bold;"> Nhập Password:</label>
                                <input style="width: 500px;" type="password" required name="txtpassword" ng-model="login.txtpassword">
                                <div ng-messages="formLogin.txtpassword.$error">
                                        <div ng-message="required" class="error-log">
                                                Yêu cầu nhập đầy đủ password.                                                
                                        </div>
                                </div>
                        </md-input-container>                       
                </div>
                <div class="row" layout-align="center center">
                        <md-button ng-disabled="formLogin.$invalid" type="submit"  name="submit" class="md-primary md-raised">
                                    Đăng nhập
                        </md-button>
                        <md-button class="md-primary md-raised" ng-click="reset()">
                                    Nhập lại
                        </md-button>                      
                </div>
        </div>        
</form> 
<?php
if(isset($_POST['submit'])){
        $email=$_POST['txtemail'];
        $password=$_POST['txtpassword'];
        $email = strip_tags($email);
        $email = addslashes($email);
        $password = strip_tags($password);
        $password = addslashes($password);
        $password=md5($password);      
       
        if( $email=="" || $password==""){          
             echo '<script language="javascript">';                                
                 echo 'toastr.warning("Yêu cầu nhập đầy đủ email và password")';
             echo '</script>';            
        
        }
        else
        {
                $sql="select * from users where email='$email' and password='$password'";
                // echo $sql;
                $rows=query($sql);
                //  var_dump($rows); 
                //  exit();               
                $count=mysqli_num_rows($rows);
                $row=mysqli_fetch_array($rows);
                if($count==0){                
                   echo '<script language="javascript">';
                        echo 'toastr.warning("Email hoặc mật khẩu không đúng.")'; 
                   echo '</script>';          
              
               }else {
                        if($row['thuocNhom']==0)
                        {       
                                $_SESSION['idUser']=$row['idUser'];
                                $_SESSION['email']=$row['email'];
                                $_SESSION['hoTen']=$row['hoTen'];
                                $_SESSION['soDienThoai']=$row['soDienThoai'];
                                $_SESSION['gioiTinh']=$row['gioiTinh'];  
                                //var_dump($_SESSION['gioiTinh']) ;                             
                                 header('location:index.php');
                                 ob_flush();
                        }
                        else {                                                             
                                $_SESSION['hoTenAdmin']=$row['hoTen'];                                
                                 header('location:admin/index.php');
                                // // ob_clean();
                                 ob_flush();
                        }
                }
        }


}
?>
    
