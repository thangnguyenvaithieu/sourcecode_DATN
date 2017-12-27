<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Angular Material style sheet -->  
    <link rel="stylesheet" href="../lib/lib_angular/angular-material.min.css">
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
        <div style="height:69%;">
            <div layout="row" layout-align="center center" style="text-transform:uppercase; margin:5px;">
                <h3>Trang quản trị viên</h3>
            </div>    
            <div flex="5"></div>           
            <!-- Bắt đầu danh mục quản lý -->       
                <div layout="row">
                    <div flex="25" style="text-transform: uppercase; text-align:center;">
                    <h6><a href="airport.php" style="color:black !important;">Quản lý sân bay</a></h6> 
                    </div>
                    <div flex="25" style="text-transform: uppercase; text-align:center;">
                        <h6><a href="doubleFlights.php" style="color:black  !important;">Quản lý tuyến bay</a></h6>
                    </div>
                    <div flex="25" style="text-transform: uppercase; text-align:center;">
                    <h6><a href="flight.php" style="color:black  !important;">Quản lý chuyến bay</a></h6>  
                    </div>
                    <div flex="25" style="text-transform: uppercase; text-align:center;">
                    <h6><a href="report.php" style="color:black !important;">Thống kê báo cáo</a></h6>  
                    </div>
                </div> 
         </div>      
        <!-- Kết thúc danh mục quản lý -->  
            <div flex="5"></div>
            <md-divider style="border-top-width: 3px !important;"></md-divider>       
            <!-- Thông tin công ty -->         
            <!-- <div flex style="background:red;"></div>      -->
            <?php
            include("../lib/footer.php");
            ?>       
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
        angular.module('BlankApp', ['ngMaterial'])
        .controller('AppCtrl', function ($scope) {               
            });                    
    </script>

</body>

</html>