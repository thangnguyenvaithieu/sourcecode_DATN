<?php
    include("model/queryDB.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Angular Material style sheet -->    
    <link rel="stylesheet" href="lib/lib_angular/angular-material.min.css">
     <!-- Thư viện cho toastjs -->    
    <script src="lib/toastr-master/jquery-1.9.1.min.js"></script>
    <script src="lib/toastr-master/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" href="lib/toastr-master/build/toastr.css">    
    <script src="lib/toastr-master/toastr.js"></script> 
</head>

<body ng-app="BlankApp" ng-cloak>
    <!-- Giao diện trên web -->
    <div layout="column" ng-controller="AppCtrl">
        <!--Bắt đầu header -->
            <?php
            include("lib/header.php");
            ?>
            <!-- Kết thúc header -->
        </div>
        <md-divider style="border-top-width: 3px !important;"></md-divider>
        <!-- Kết thúc Logo, đăng kí, đăng nhập -->

        <!-- Dòng chữ chạy -->
        <div flex="5"></div>        

        <!-- Bắt đầu form login -->
        <div flex="60" layout="colum" layout-align="center center">
             <?php
                    include("view/login_form.php"); 
              ?>
        </div>
       
        <!-- Kết thúc form login -->       

        <div flex="5"></div>
        <md-divider style="border-top-width: 3px !important;"></md-divider>
        
        <!-- Thông tin công ty -->       
        
        <!-- <div flex style="background:red;"></div>      -->
        <?php
        include("lib/footer.php");
        ?>
        <!-- Kết thúc thông tin công ty -->
    </div>
    <!-- Kết thúc giao diện trên web -->     

    <!-- Angular Material requires Angular.js Libraries -->      
    <script src="lib/lib_angular/angular.min.js"></script>
    <script src="lib/lib_angular/angular-animate.min.js"></script>
    <script src="lib/lib_angular/angular-aria.min.js"></script>
    <script src="lib/lib_angular/angular-messages.min.js"></script>
    

    <!-- Thư viện cho định dạng thời gian của datepicker -->
    <script type="text/javascript" src="lib/lib_angular/moment-with-locales.min.js"></script>

    <!-- Thư việc cho slideshow -->
     <link rel="stylesheet" href="lib/lib_bootstrap/bootstrap.min.css">
    <script src="lib/lib_bootstrap/jquery.min.js"></script>
    <script src="lib/lib_bootstrap/popper.min.js"></script>
    <script src="lib/lib_bootstrap/bootstrap.min.js"></script>

    <!-- Angular Material Library -->
    <script src="lib/lib_angular/angular-material.min.js"></script>

    <!-- Your application bootstrap  -->
    <script type="text/javascript">        
        angular.module('BlankApp', ['ngMaterial','ngMessages'])           
            .controller('AppCtrl', function ($scope) {  
                $scope.login={};
                 $scope.reset=function () {
                    $scope.login={};
                    $scope.formLogin.$setPristine();
                    $scope.formLogin.$setUntouched(); 
                    $('.error-log').css('display','none');                        
                 
                }                            
            });
            $(document).ready(function () {
                // console.log("Hello");
                $("#divFocus").find("input").focus();                
            })            
    </script>

</body>

</html>