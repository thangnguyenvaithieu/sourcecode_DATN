<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Angular Material style sheet -->    
    <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css"> -->
    <link rel="stylesheet" href="lib/lib_angular/angular-material.min.css">
    <!-- Thư viện cho toastjs -->    
    <script src="lib/toastr-master/jquery-1.9.1.min.js"></script>
    <script src="lib/toastr-master/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" href="lib/toastr-master/build/toastr.css">    
    <script src="lib/toastr-master/toastr.js"></script>  

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>   -->
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
        <!-- Form lựa chọn chuyến bay -->
        <!-- <div layout="row">           -->
           <?php
                include ("view/luaChonCB_form.php");
            ?>
        <!-- </div> -->
        <!-- Kết thúc form lựa chọn chuyến bay -->

        <div flex="5"></div>
        <!-- <md-divider style="border-top-width: 3px !important;"></md-divider> -->
        <!-- Thông tin công ty --> 
        
        <!-- <div flex style="background:red;"></div>      -->
        <!-- <div layout="row" layout-align="start end"> -->
             <!-- <?php
                include("lib/footer.php");
            ?> -->
        <!-- </div> -->
       
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
        angular.module('BlankApp', ['ngMaterial'])
            
            .controller('AppCtrl', function ($scope) {
                
            });
    </script>
    <script>
    // Tổng chi phí theo hạng vé
    $(document).ready(function () {
         $('.menu-sidebar>div').click(function () {
             if($(this).hasClass('active'))
             {
                $(this).children('.sub-menu').slideUp();
                $(this).removeClass('active');
             }
             else
             {
                $(this).children('.sub-menu').slideDown();
                $(this).addClass('active');
             }
         });
     });
     
             
    </script>
</body>

</html>