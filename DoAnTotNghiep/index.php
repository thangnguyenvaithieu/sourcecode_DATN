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

        <!-- Bắt đầu form tìm kiếm chuyến bay -->
        <div layout="row">
            <!-- Form tìm kiếm chuyến bay -->
            <div flex="5"></div>
            <div flex="40" style="border:1px solid #cdcdcd; border-radius:5px; padding-left: 10px; padding-top: 10px;">
                <?php
                    include "view/timChuyenBay.php"; 
                ?>
            </div>
            <!-- Kết thúc form tìm kiếm chuyến bay -->
            <!-- Bắt đầu slide show -->
            <div flex="45" style="margin-left: 5px;">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="3"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/slide1.jpg" alt="Sa Pa" width="600" height="398">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide2.jpg" alt="Đại Lải" width="600" height="398">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide3.jpg" alt="Ba Vì" width="600" height="398">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide4.jpg" alt="Tam Đảo" width="600" height="398">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <!-- kết thúc slide show -->
        </div>

        <div flex="5"></div>
        <md-divider style="border-top-width: 3px !important;"></md-divider>
        <!-- Kết thúc form tìm kiếm chuyến bay -->
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
        angular.module('BlankApp', ['ngMaterial'])
            // .config(function ($mdDateLocaleProvider) {
            //     $mdDateLocaleProvider.formatDate = function (date) {
            //         return moment(date).format('DD-MM-YYYY');
            //     }
            // })
            .controller('AppCtrl', function ($scope) {
                // $scope.hanhTrinh = "khuHoi";
                // $scope.ngayVe = true;
                // $scope.getVal = function () {
                //     // console.log($scope.hanhTrinh);
                //     if ($scope.hanhTrinh == "motChieu")
                //         $scope.ngayVe = false;
                //     else
                //         $scope.ngayVe = true;

                // };
            });
    </script>

</body>

</html>