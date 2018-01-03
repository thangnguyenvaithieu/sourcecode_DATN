<div id="dschuyenbayden">
                <div style="display: block;">                    
                    <div>
                        <h6>Chuyến bay từ <?php echo $tenSBDen; ?>                         
                            <span></span>
                                    đến <?php echo $tenSBDi; ?>
                            <span></span>
                            <span>vào ngày <?php echo date("d/m/Y",strtotime($ngayDen)); ?></span>
                        </h6>
                    </div>
                    <div class="list-tabs-wrap">                
                        <div class="list-tabs" style="background-color: #cdcdcd;">
                            <p style="color:white; font-size: 20px;font-weight:bold; text-align:center; ">
                                <?php echo $thuVe; ?> 
                                <br/>
                                ngày <?php echo date("d/m/Y",strtotime($ngayDen)); ?>
                            </p>
                        </div>
                    </div>
                    <div role="grid">
                        <div style="display: block;">
                            <div class="RadGrid RadGrid_Default" style="border-color:White;background: #E2F3F5" tabindex="0">
                                <table cellspacing="0" style="width:100%;table-layout:auto;empty-cells:show;">
                                                <!-- <thead> -->
                                                    <tr>
                                                        <th  style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                            HÃNG
                                                        </th>
                                                        <th style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                            SỐ HIỆU
                                                        </th>
                                                        <th  style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                            GIỜ ĐI
                                                        </th>
                                                        <th  style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                            GIỜ ĐẾN
                                                        </th>
                                                        <th  style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                            GIÁ
                                                        </th>
                                                        <th  style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                            CHỌN
                                                        </th>
                                                        <th  style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                            THÊM
                                                        </th>                                                       
                                                    </tr>
                                                    <hr/>
                                                <!-- </thead> -->
                                                <?php
                                                    $demCBKH = 0;
                                                    // Chuyến bay khứ hồi                                                  
                                                    $maTBKH = layMatb($tenSBDen,$tenSBDi);
                                                    // var_dump($maTBKH);  
                                                    $rowMaTBKH = mysqli_fetch_array($maTBKH);
                                                    $maTBKH = $rowMaTBKH['maTuyenBay'];
                                                    // var_dump($maTBKH);
                                                    
                                                    $rowsMCBKH= layChuyenBay($maTBKH,$ngayDen);
                                                    while($rowMCBKH=mysqli_fetch_array($rowsMCBKH))
                                                    {
                                                    $maCBKH=$rowMCBKH['maChuyenBay'];
                                                    // var_dump($maCBKH);       
   
                                                   $rowsCTCB = layCTCB($maCBKH,$maHV); 
                                                //   var_dump($rowsCTCB);
                                                   $countCBKH=mysqli_num_rows($rowsCTCB);
                                                   $demCBKH=$demCBKH+$countCBKH;                                                  
                                                   while ($rowCTCB = mysqli_fetch_array($rowsCTCB))
                                                 {
                                                ?>         
                                                                                             
                                                <!-- <tbody> -->
                                                    <tr style="font-family:arial;font-size:16px;">
                                                        <td align="center">
                                                            <img src="img/VA.jpg" alt="ảnh" height="50">
                                                        </td>
                                                        <td align="center">                                                      
                                                            <?php echo $rowCTCB['maChuyenBay']; ?>
                                                        </td>
                                                        <td align="center">
                                                            <?php echo $rowCTCB['gioKhoiHanh']; ?>  
                                                        </td>
                                                        <td align="center">
                                                            <?php echo $rowCTCB['gioDen']; ?>
                                                        </td>
                                                        <td align="center" style="color:#EE0000;font-weight:bold;">
                                                           <?php echo number_format($rowCTCB['donGia']); ?> VND
                                                        </td>
                                                        <td align="center">
                                                            <span>
                                                                <input type="radio" name="KHchecked" value="<?php echo $maCBKH ?>"
                                                                   onchange="getCBKHCChecked('<?php echo $maCBKH ?>');" required/>
                                                            </span>
                                                        </td>
                                                        <td align="center">                                                                           
                                                            <div class="menu-sidebar">
                                                                <div>
                                                                    <a href="javascript:void(0)">
                                                                        <div> &nbsp&nbspXem&nbsp&nbsp</div>
                                                                    </a>                                    
                                                                    <div class="sub-menu">
                                                                            <table style="display:">
                                                                                <tr style="font-size: 13px;">
                                                                                    <!-- <th>Hãng máy bay</th> -->
                                                                                    <th>Mã cb</th>
                                                                                    <th>Ngày đi</th>
                                                                                    <th>Ngày đến</th>
                                                                                    <!-- <th>Giờ khởi hành</th> -->
                                                                                    <!-- <th>Giờ đến</th> -->
                                                                                    <th>Hạng vé</th>
                                                                                    <th>Giá</th>   
                                                                                </tr>                                                                           
                                                                                <tr style="font-size: 13px;">
                                                                                    <!-- <td><?php echo $rowCTCB['tenHangMayBay']; ?></td> -->
                                                                                    <td><?php echo $rowCTCB['maChuyenBay']; ?></td>
                                                                                    <td><?php echo $rowCTCB['ngayKhoiHanh']; ?></td> 
                                                                                    <td><?php echo $rowCTCB['ngayDen']; ?></td>
                                                                                    <!-- <td><?php echo $rowCTCB['gioKhoiHanh']; ?></td>  -->
                                                                                    <!-- <td><?php echo $rowCTCB['gioDen']; ?></td>                                                                              -->
                                                                                    <td><?php echo $rowCTCB['tenHangVe']; ?></td>
                                                                                    <td><?php echo $rowCTCB['donGia']; ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </tr>
                                                                    </div>                                   
                                                                </div>
                                                            </div> 
                                                        </td>                                                        
                                                    </tr>
                                                <!-- </tbody>    -->
                                            <?php
                                                } 
                                            ?>
                                        <?php
                                            }
                                        ?>
                                </table>                                
                            </div>
                            <?php 
                                if($demCBKH=="0")
                                 echo "<h6 style='color:red;'>Không có chuyến bay theo các yêu cầu của bạn. Mời bạn chọn chuyến bay lại.</h6>";
                            ?>
                        </div> 
                    </div>         
                </div>
</div>