<html>
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
        <div layout="row" layout-align="center center" style="text-transform:uppercase; margin:5px;" class="test-tooltip">
                <h4><a href="airport.php" style="color: inherit;">Quản lý thông tin sân bay</a></h4>
                <!-- <md-tooltip md-direction="top">Về trang quản lý sân bay</md-tooltip>  -->
        </div>   
        <div layout="column" layout-align="center center">
            <?php
                include("model/airport.php");
                include("controller/airport.php");
                include("view/airport/listAirport.php");
            ?>     
        </div>       
        <!-- Kết thúc danh mục quản lý -->  
            <!-- <div flex="5"></div>
            <md-divider style="border-top-width: 3px !important;"></md-divider>        -->
            <!-- Thông tin công ty -->         
            <!-- <div flex style="background:red;"></div>      -->
            <!-- <?php
            include("../lib/footer.php");
            ?>        -->
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
                $scope.newAirport={};
                $scope.resetNew=function () {
                    $scope.newAirport={};
                    $scope.formNewAirport.$setPristine();
                    $scope.formNewAirport.$setUntouched();      
                    $('.error-log').css('display', 'none');  
                };
            });              
    </script>
    <script>
        toastr.options.extendedTimeOut = 0; //1000;
        toastr.options.timeOut = 2000;
        toastr.options.fadeOut = 250;
        toastr.options.fadeIn = 250;  

        $(document).ready(function () {
            $('#resetEdit').click(function () {
                var input = $('#resetFormEdit').find('input');
                //console.log(input);
                input.each(function () {
                    if($(this).attr('type') == 'text') {
                        //console.log('ok');
                        $(this).val('');
                    }
                })
            });

        $("#divFocusNew").find("input").focus(); 
        $("#divFocusEdit").find("input").focus(); 
            
        });
    </script>
</body>
</html>