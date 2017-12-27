<div id="dschuyenbaydi">
                <div style="display: block;">                    
                    <div>
                        <h6>Chuyến bay từ <?php echo  $tenSBDi; ?>                         
                            <span></span>
                                    đến <?php echo $tenSBDen; ?>
                            <span></span>
                            <span>vào ngày <?php echo date("d/m/Y",strtotime($ngayDi)); ?></span>
                        </h6>
                    </div>
                    <div class="list-tabs-wrap">                
                        <div class="list-tabs" style="background-color: #cdcdcd;">
                            <p style="color:white; font-size: 20px;font-weight:bold; text-align:center; ">
                                <?php echo $thuDi; ?> 
                                <br/>
                                ngày <?php echo date("d/m/Y",strtotime($ngayDi)); ?>
                            </p>
                        </div>
                    </div>
                    <div role="grid">
                        <div style="display: block;">
                            <div class="RadGrid RadGrid_Default" style="border-color:White;background: #E2F3F5" tabindex="0">
                                <table cellspacing="0" style="width:100%;table-layout:auto;empty-cells:show;">
                                    <!-- <div style="text-decoration: underline;"> -->
                                        <tr>
                                            <th style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                HÃNG
                                            </th>
                                            <th  style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
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
                                            <th   style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                CHỌN
                                            </th>
                                            <th   style="font-family:arial;font-size:16px;font-weight:bold;text-align:center;">
                                                THÊM
                                            </th>
                                        </tr>
                                        <hr/>
                                    <!-- </div> -->
                                    <?php
                                        $demCB=0;
                                        $rowsMCB1C= layChuyenBay($maTB1C,$ngayDi);
                                        // var_dump($rowsMCB1C);
                                         while($rowMCB1C=mysqli_fetch_array($rowsMCB1C))
                                         {  
                                            $maCB1C=$rowMCB1C['maChuyenBay'];                                                                
                                            $rowsCTCB = layCTCB($maCB1C,$maHV); 
                                                //    var_dump($rowsCTCB);
                                             $countCB1C=mysqli_num_rows($rowsCTCB);
                                             $demCB = $demCB + $countCB1C; 
                                            //  var_dump($countCB1C);                                                 
                                            while ($rowCTCB = mysqli_fetch_array($rowsCTCB))
                                                 {
                                            ?>        
                                                                                             
                                    <!-- <tbody> -->
                                        <tr style="font-family:arial;font-size:16px;">
                                            <td align="center">
                                                <img <?php if($rowCTCB['maHangMayBay']=="VNA") echo "src='img/VA.jpg'"; else {if($rowCTCB['maHangMayBay']=="VJ") echo "src='img/VJ.png'";}?>  src="img/VA.jpg" alt="ảnh" height="50">
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
                                                           <?php echo $rowCTCB['donGia']; ?> VND
                                                        </td>
                                                         <td align="center">
                                                            <span>
                                                                <input type="radio" name="1Cchecked" value="<?php echo $maCB1C; ?>"
                                                                   onchange="getCB1CChecked('<?php echo $maCB1C; ?>');"/>
                                                            </span>
                                                        </td>
                                                        <td align="center">                                                                        
                                                            <div class="menu-sidebar">
                                                                <div>
                                                                    <a href="javascript:void(0)">
                                                                        <div> &nbsp&nbspXem&nbsp&nbsp</div>
                                                                    </a>                                    
                                                                    <div class="sub-menu">
                                                                        <table>
                                                                            <tr style="font-size: 13px;">
                                                                                <th>Mã cb</th>
                                                                                <th>Ngày đi</th>
                                                                                <th>Ngày đến</th>
                                                                                <!-- <th>Giờ đi</th> -->
                                                                                <!-- <th>Giờ đến</th> -->
                                                                                <th>Hạng vé</th>
                                                                                <th>Giá</th>   
                                                                            </tr>                                                                           
                                                                            <tr style="font-size: 13px;">
                                                                                <td><?php echo $rowCTCB['maChuyenBay']; ?></td>
                                                                                <td><?php echo date("d/m/Y",strtotime($rowCTCB['ngayKhoiHanh'])); ?></td> 
                                                                                <td><?php echo date("d/m/Y",strtotime($rowCTCB['ngayDen'])); ?></td>
                                                                                <!-- <td><?php echo $rowCTCB['gioKhoiHanh']; ?></td>  -->
                                                                                <!-- <td><?php echo $rowCTCB['gioDen']; ?></td>                                                                              -->
                                                                                <td><?php echo $rowCTCB['tenHangVe']; ?></td>
                                                                                <td><?php echo $rowCTCB['donGia']; ?>VND</td>
                                                                            </tr>  
                                                                        </table>
                                                                    </div>                                   
                                                                </div>
                                                            </div> 
                                                        </td>                                                       
                                                    </tr>
                                                <!-- </tbody> -->
                                            <?php
                                                } 
                                            ?> 
                                        <?php
                                         }
                                        ?>                                          
                                </table>                                
                            </div>
                            <?php 
                                if($demCB=="0")
                                 echo "<h6 style='color:red;'>Không có chuyến bay theo các yêu cầu của bạn. Mời bạn chọn chuyến bay lại.</h6>";
                            ?>
                        </div> 
                    </div>         
                </div>
</div>