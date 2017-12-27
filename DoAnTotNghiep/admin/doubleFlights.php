<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Angular Material style sheet -->  
    <link rel="stylesheet" href="../lib/lib_angular/angular-material.min.css">
     <!-- Thư viện cho toastjs -->    
    <script src="../lib/toastr-master/jquery-1.9.1.min.js"></script>
    <script src="../lib/toastr-master/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" href="../lib/toastr-master/build/toastr.css">    
    <script src="../lib/toastr-master/toastr.js"></script> 
</head>
<body ng-app="BlankApp" ng-cloak>
    <!-- Giao diện trên web -->
    <div layout="column" ng-controller="AppCtrl">
        <!--Bắt đầu header -->        
            <?php
            include("lib/headerAdmin.php");
            ?>
        <!-- Kết thúc header --> 
        <md-divider style="border-top-width: 3px !important;"></md-divider>
        <div layout="row" layout-align="center center" style="text-transform:uppercase; margin:5px;">
               <h4><a href="doubleFlights.php" style="color: inherit;">Quản lý thông tin tuyến bay</a></h4>
               <!-- <md-tooltip md-direction="right">Về trang quản lý tuyến bay</md-tooltip>  -->
        </div>   
        <div layout="column" layout-align="center center">
            <?php
                // include("model/airport.php");
                include("model/doubleFlights.php");                                
                include("controller/doubleFlights.php");
                include("view/doubleFlights/listDoubleFlights.php");
            ?>     
        </div>   
       
    </div>
    <!-- Kết thúc giao diện trên web -->       

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="../lib/lib_angular/angular.min.js"></script>
    <script src="../lib/lib_angular/angular-animate.min.js"></script>
    <script src="../lib/lib_angular/angular-aria.min.js"></script>
    <script src="../lib/lib_angular/angular-messages.min.js"></script>
    

    <!-- Thư viện cho định dạng thời gian của datepicker -->   
    <script type="text/javascript" src="../lib/lib_angular/moment-with-locales.min.js"></script>   

    <!-- Thư việc cho slideshow -->   
    <link rel="stylesheet" href="../lib/lib_bootstrap/bootstrap.min.css">
    <script src="../lib/lib_bootstrap/jquery.min.js"></script>
    <script src="../lib/lib_bootstrap/popper.min.js"></script>
    <script src="../lib/lib_bootstrap/bootstrap.min.js"></script>   

    <!-- Angular Material Library -->    
    <script src="../lib/lib_angular/angular-material.min.js"></script>

    <!-- Your application bootstrap  -->
    <script type="text/javascript">        
        angular.module('BlankApp', ['ngMaterial','ngMessages'])
         .config(['$httpProvider', function ($httpProvider) {
        //Reset headers to avoid OPTIONS request (aka preflight)
            $httpProvider.defaults.headers.common = {};
            $httpProvider.defaults.headers.post = {};
            $httpProvider.defaults.headers.put = {};
            $httpProvider.defaults.headers.patch = {};
         }])
        .controller('AppCtrl', function ($scope) { 
        //reset form thêm sân bay               
                $scope.newDoubleFlights={};
                $scope.resetNew=function () {
                     $scope.newDoubleFlights={};
                     $scope.formNewDoubleFlights.$setPristine();
                     $scope.formNewDoubleFlights.$setUntouched();      
                    $('.error-log').css('display', 'none');                    
                    $("#maSanBayDi").html('<option value="">None</option>');
                    $("#maSanBayDen").html('<option value="">None</option>');   
                   
                };

                $scope.resetEdit=function () {
                    $scope.formEditDoubleFlights.$setPristine();
                    $scope.formEditDoubleFlights.$setUntouched();
                    var select = $("#formEditDoubleFlights").find('select');
                    console.log(select);
                    select.each(function () {
                        // console.log("Hello");                        
                    });                   
                };               
            });              
    </script>
    <script>
        toastr.options.extendedTimeOut = 0; //1000;
        toastr.options.timeOut = 2000;
        toastr.options.fadeOut = 250;
        toastr.options.fadeIn = 250; 
        toastr.options.closeButton = true;
        
        // Hiển thị mã sân bay theo mã sân bay
        $(document).ready(function () {
            $("#noiDi").change(function () {                           
                var val=$(this).val();                                       
                $.get("lib/maSBTheoTenSB.php",{noiDi:val},function (data) {
                    // console.log(data);                                       
                    $("#maSanBayDi").html(data);       

                });                               
            });
        });
         $(document).ready(function () {
            $("#noiDen").change(function () {
                var val=$(this).val();
                $.get("lib/maSBTheoTenSB.php",{noiDen:val},function (data) {
                    $("#maSanBayDen").html(data);                    
                });                
            });
        });   
        //Kết thúc hiển thị mã sân bay theo tên sân bay    
    </script>
</body>
</html>