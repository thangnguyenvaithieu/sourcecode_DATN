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
               <h4><a href="flight.php" style="color: inherit;">Quản lý thông tin chuyến bay</a></h4>
               <!-- <md-tooltip md-direction="right">Về trang quản lý tuyến bay</md-tooltip>  -->
        </div>   
        <div layout="column" layout-align="center center">
            <?php
                // include("model/airport.php");
                include("model/flight.php");                                
                include("controller/flight.php");
                include("view/flight/listFlight.php");
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
                $scope.newFlight={};
                $scope.resetNew=function () {
                     $scope.newDoubleFlights={};
                     $scope.formNewFlight.$setPristine();
                     $scope.formNewFlight.$setUntouched();      
                    $('.error-log').css('display', 'none');                  
                };
               
            //    Reset form edit flight
                // $scope.editFlight={};
                $scope.resetEdit=function () {
                    // $scope.editFlight={};
                    $scope.formEditFlight.$setPristine();
                    $scope.formEditFlight.$setUntouched();
                    $('.error-log').css('display', 'none');
                    // $("#maHangMayBay").html('<option value="">Tên hãng(Mã hãng)</option>');
                    // $("#maTuyenBay").html('<option value="">Mã tuyến bay( Nơi đi-Nơi đến )</option>');
                    // $("#inputMaChuyenBay").html('<input style="width: 500px; margin-left:5px;"  required name="maChuyenBay" id="maChuyenBay" value="">');
                    // $("#maHangVe").html('<option value="">Hạng vé(Mã hạng vé)</option>');
                    $("#idInputDonGia").html('<input style="width: 450px; margin-left:5px;"  name="donGia" id="donGia" value="">'); 
                }
            });              
    </script>
    <script> 
    //  Hiển thị giá vé theo mã hạng vé và mã chuyến bay
     $(document).ready(function () {
            $("#maHangVe").change(function () {                           
                var valCB=$('#maChuyenBay').val();
                var valHV=$(this).val();                                                       
                $.get("lib/giaVeTheoMaHV.php",{maCB:valCB,maHV:valHV},function (data) {                                                          
                    $("#idInputDonGia").html(data);                                                                                                   
                });                               
            });
        });

        //Hiển thị chi tiết thông tin về hạng vé theo chuyến bay trên listFlight.php   
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