<style>
    .sub-menu{
        display:none;
    }
</style>
<?php
include "model/functionCommon.php";

if (isset($_GET['ngayDen'])) {
    $ngayDen = $_GET['ngayDen'];
    $thangV = date('m', strtotime($ngayDen));
    $ngayV = date('d', strtotime($ngayDen));
    $namV = date('Y', strtotime($ngayDen));
    $thuVe = LayThuBatKyTrongNam($ngayV, $thangV, $namV);
}

    $tenSBDi = $_GET['tenSanBayDi'];
    $tenSBDen = $_GET['tenSanBayDen'];
    $ngayDi = $_GET['ngayDi'];
    $thangD = date('m', strtotime($ngayDi));
    $ngayD = date('d', strtotime($ngayDi));
    $namD = date('Y', strtotime($ngayDi));
    $thuDi = LayThuBatKyTrongNam($ngayD, $thangD, $namD);

    $nguoiLon = $_GET['nguoiLon'];    
    $treEm = $_GET['treEm'];
    $treSoSinh = $_GET['treSoSinh'];
    $maHV = $_GET['hangVe'];
    $hanhTrinh = $_GET['hanhTrinh'];
    

    // Chuyến bay 1 chiều
    $maTB1C=layMatb($tenSBDi,$tenSBDen);
    $rowMaTB1C=mysqli_fetch_array($maTB1C);
    $maTB1C=$rowMaTB1C['maTuyenBay'];
    // var_dump($maTB1C);
       
?>

<form action="nhaptt.php" method="GET">  
    <div layout="row">
        <div flex="10"></div>
        <!-- bảng lựa chọn chuyến bay -->
        <div flex="60" layout="column">
        <!-- Băt đầu danh sách các chuyến bay đi -->            
            <?php
                include "luachonCB_1C.php";
            ?>
        <!-- Kết thúc bảng lựa chọn chuyến bay đi-->    
        
        <hr style="width:auto solid black; height:2px;"/>
        
        <!--Danh sách lựa chọn chuyến bay về  -->
        <?php 
            if(isset($_GET['ngayDen']))
            {        
                include "luachonCB_KH.php";           
            }
        ?>
        <!-- Kết thúc danh sách lựa chọn chuyến bay về -->
        <div layout="row" layout-align="end center">
            <md-button class="md-raised;" style="background-color: rgb(63,81,181); color:white;" type="submit">Tiếp tục</md-button>
        </div>
        </div>
        <!-- Bảng tổng giá vé theo chuyến bay được chon -->
        <div layout="column" flex="20"  layout-align="center start" style="margin-left:20px;">
            <!-- Tiêu đề -->
            <!-- <div style="border:1px solid;"> -->
                <div>
            <label style="font-weight:bold; font-size:16px; text-transform:uppercase;  text-decoration: underline;">Tóm tắt thông tin</label>
                <!-- <hr style="width:auto solid black; height:5px; ">  -->
                </div>
                <!--Loại vé -->
                <div>
                        <span style="text-align:left;">Loại vé:
                        <?php 
                            if (isset($_GET['ngayDen']))
                        { ?>
                            <span style="text-align:left;"> Khứ hồi</span>
                        <?php
                        } 
                        else
                        { 
                        ?>
                            <span style="text-align:left;">Một chiều</span>
                        </span>
                        <?php
                        } 
                        ?>              
                </div>
                <!-- Chuyến đi -->
                <div id="chuyendi">
                    <div >
                        CHUYẾN ĐI
                    </div>
                    <!-- Chi tiết giá vé -->
                    <div>
                        <label>Giá vé(chưa bao gồm thuế phí)</label>
                        <div layout="row">
                            <div flex="50">Người lớn:</div>
                            <div flex="50">
                                <span>___</span>VNĐ
                            </div>
                        </div>
                        <div layout="row">
                            <div flex="50">Trẻ em:</div>
                            <div flex="50">
                                <span>___</span>VNĐ
                            </div>
                        </div>
                        <div layout="row">
                            <div flex="50">Sơ sinh:</div>
                            <div flex="50">
                                <span>___</span>VNĐ
                            </div>
                        </div>
                        <div layout="row">
                            <div flex="50">
                                Tổng giá tiền
                            </div>            
                            <div flex="50">
                                <span style="display: inline" id="tongdi"></span>
                                    VND
                                </div>
                        </div>
                    </div>
                </div>
                <hr style="width:auto solid black; height:5px; "/>
                <?php if(isset($_GET['ngayDen']))
                {
                ?>
                <div id="chuyenve">
                    <div>
                        CHUYẾN VỀ
                    </div>
                    <!-- Chi tiết giá vé -->
                    <div>
                        <label>Giá vé chưa bao gồm thuế phí</label>
                        <div layout="row">
                            <div flex="50">Người lớn:</div>
                            <div flex="50">
                                <span>___</span> VNĐ
                            </div>
                        </div>
                        <div layout="row">
                            <div flex="50">Trẻ em:</div>
                            <div flex="50">
                                <span>___</span> VNĐ
                            </div>
                        </div>
                        <div layout="row">
                            <div flex="50">Sơ sinh:</div>
                            <div flex="50">
                                <span>___</span> VNĐ
                            </div>
                        </div>
                        <div layout="row">
                            <div flex="50">
                                Tổng giá tiền
                            </div>            
                            <div flex="50">
                                <span style="display: inline" id="tongve"></span>
                                    VND
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?> 
                <!-- <hr style="width:auto solid red; height:5px; "/>            -->
                <!-- <div layout="row">
                    <div style="font-size:15px; font-weight:bold;">
                        TỔNG CỘNG:
                    </div>
                    <div>
                        <span id="tongcong">0</span>                
                    </div>
                    <div> VND</div>       
                </div> -->
            <!-- </div> -->
        </div>
        <!-- Kết thúc bảng tổng giá vé theo chuyến bay được chon-->
        <div flex="10"></div>
    </div> 
</form>
<script>
    //  Tính tổng tiền phải trả theo hạng vé
    function getCB1CChecked(mcb) {            
            $.get("tongDi.php", 
            {
                // console.log(mcb);
                checked: mcb,
                hv : <?php echo '"'.$maHV.'"'; ?>,
                nl : <?php echo $nguoiLon; ?>,
                te : <?php echo $treEm; ?>,
                tss: <?php echo $treSoSinh; ?>,
                ht:<?php echo '"'.$hanhTrinh.'"'?>
            }, function (data) {
                // console.log(data);   
                $("#chuyendi").html(data);              

            });
        };

        function getCBKHCChecked(mcb) {
            $.get("tongVe.php", 
            {
                checked: mcb,
                hv : <?php echo '"'.$maHV.'"'; ?>,
                nl : <?php echo $nguoiLon; ?>,
                te : <?php echo $treEm; ?>,
                tss: <?php echo $treSoSinh; ?>                
            }, function (data) {
                // console.log(data);
                $("#chuyenve").html(data);
                //  alert("Hello");        
                              
            });
        }; 
        // if($("#tongdi").html() != "" && $("tongve").html() !="")
        // {
        //     console.log("ca 2")
        //     var td=$("#tongdi").html();
        //     var tv=$("tongve").html();
        //     var tc=parseInt(td)+parseInt(tv);
        //     $("#tongcong").html(tc);      
        //  }  
        //  else
        //  {
        //      if($("#tongdi").html() != "" && $("tongve").html() =="")
        //      {
        //          console.log("duoc 1 a");                 
        //          var td=$("#tongdi").html();
        //          $("#tongcong").html(td);
        //      }
        //      else
        //      {
        //       if($("#tongdi").html() == "" && $("tongve").html() !="")
        //      {
        //          console.log("duoc 1 b");         
                 
        //          var td=$("#tongve").html();
        //          $("#tongcong").html(td);
        //      }
        //      else
        //         if($("#tongdi").html() == "" && $("tongve").html() =="")
        //         {
        //             console.log("ko duoc cai nao");
        //             $("#tongcong").html('0');
        //         }
        //      }          

        //  }
</script>
