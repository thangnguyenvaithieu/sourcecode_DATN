<style>
    .sub-menu{
        display:none;
    }
</style>
<div style="text-align:center">
    <h5><a href="flight.php?action=new">Thêm chuyến bay</a></h5>
</div>
 <h4 style="text-align:center;">Danh sách chuyến bay</h4>
<div>
    <form action="flight.php" method="GET">
        <div layout="row" layout-align="center center">
            <div>
                <md-input-container class="md-block">
                    <label style="font-weight:bold; ">Tìm kiếm chuyến bay theo nơi đi(nơi đến) :</label>
                    <input  type="text" style="width: 500px;" name="test" id="keyword">              
                </md-input-container>
            </div>
            <div> 
                <md-button class="md-primary md-raised" style="font-weight:normal;" type="submit"> 
                        Tìm kiếm
                </md-button>  
            </div>  
        </div>        
    </form>
</div>
 <!--Kết thúc form tìm kiếm theo sân bay đi hoặc sân bay đến -->
<div class="container table-responsive">
<form action="#" method="POST">
    <center>
        <table class=" table table-bordered table-hover text-center">
            <tr style="background:#cdcdcd;">
            <th>Tên hãng <br>(Mã hãng) </th>
            <th>Mã chuyến bay</th>
            <th>Mã tuyến bay</th>
            <th>Sân bay đi</th>
            <th>Sân bay đến</th>            
            <th>Ngày khởi hành</th>            
            <th>Ngày đến</th>
            <th>Giờ khởi hành</th>
            <th>Giờ đến</th>
            <th>Trạng thái</th>
            <th>Chi tiết</th>
            <th>Thao tác</th>            
            </tr>                       
                <?php                
                 if(!isset($_GET['keyword']))
                    {                        
                        $soChuyenBayTrenTrang=10;
                        if(isset($_GET['trang']))
                        {
                            $trang=$_GET['trang'];
                            settype($trang,"int");
                        }
                        else {
                            $trang=1;
                        }
                        $trangHienTai=($trang-1)*$soChuyenBayTrenTrang;
                        $sql="SELECT hmb.*, cb.maChuyenBay,cb.ngayKhoiHanh,cb.ngayDen,cb.gioKhoiHanh,cb.gioDen,cb.trangThai,cb.maTuyenBay, tb.noiDi, tb.noiDen
                         from (hangmaybay as hmb join chuyenbay as cb on hmb.maHangMayBay=cb.maHangMayBay) join tuyenbay as tb on cb.maTuyenBay=tb.maTuyenBay 
                         order by maChuyenBay desc limit $trangHienTai,$soChuyenBayTrenTrang";            
                    }
                    
                    if(isset($_GET['test']))
                    {
                        $keyword=$_GET['test'];
                        $sql="SELECT hmb.*, cb.maChuyenBay,cb.ngayKhoiHanh,cb.ngayDen,cb.gioKhoiHanh,cb.gioDen,cb.trangThai,cb.maTuyenBay, tb.noiDi, tb.noiDen
                         from (hangmaybay as hmb join chuyenbay as cb on hmb.maHangMayBay=cb.maHangMayBay) join tuyenbay as tb on cb.maTuyenBay=tb.maTuyenBay                         
                         where maChuyenBay like '%$keyword%' || noiDi like '%$keyword%' || noiDen like '%$keyword%'";                            
                    }
                        $rows=query($sql);
                        $count=mysqli_num_rows($rows);
                        // var_dump($rows);                       
                        while($row=mysqli_fetch_array($rows))
                        {    
                      ?>
                     <tr>
                        <td><?php echo $row['tenHangMayBay']; ?> (<?php echo $row['maHangMayBay']; ?>) </td>
                        <td><?php echo $row['maChuyenBay'] ?></td>
                        <td><?php echo $row['maTuyenBay']; ?></td>
                        <td><?php echo $row['noiDi']; ?></td>
                        <td><?php echo $row['noiDen']; ?></td>
                        <td><?php echo date("d/m/Y",strtotime($row['ngayKhoiHanh'])); ?></td>
                        <td><?php echo date("d/m/Y",strtotime($row['ngayDen'])); ?></td>
                        <td><?php echo $row['gioKhoiHanh']; ?></td>
                        <td><?php echo $row['gioDen']; ?></td>                                                
                        <td>
                            <?php if($row['trangThai']=="1")
                            echo "Hiện";
                        else 
                            {
                            echo "Ẩn";
                            } ?>
                        </td> 
                        <!-- Hiển thị chi tiết thông tin về hạng vé theo chuyến bay  -->
                        <td>  
                        <?php                            
                            $sqlCTCB="SELECT hvcb.maHangVe,hv.tenHangVe,hvcb.donGia,hvcb.maChuyenBay 
                            FROM hangve_chuyenbay as hvcb join hangve as hv on hvcb.maHangVe=hv.maHangVe
                            WHERE maChuyenBay='$row[maChuyenBay]'"; 
                            $rowsCTCB=query($sqlCTCB);                           
                        ?>                       
                            <div class="menu-sidebar">
                                <div>
                                    <a href="javascript:void(0)">
                                        <div> &nbsp&nbspXem&nbsp&nbsp</div>
                                    </a>                                    
                                    <div class="sub-menu">
                                        <table class="table">
                                            <tr>
                                                <th>Mã HV</th>
                                                <th>Tên HV</th>
                                                <th>Giá vé</th>
                                            </tr>
                                            <?php
                                            while ($rowCTCB = mysqli_fetch_array($rowsCTCB)) 
                                            {
                                            ?>
                                                <tr>
                                                    <td><?php echo $rowCTCB['maHangVe']; ?></td>
                                                    <td><?php echo $rowCTCB['tenHangVe']; ?></td>
                                                    <td><?php echo $rowCTCB['donGia']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>                                   
                                </div>
                             </div>
                        </td>                                                                       
                        <td layout="row" style="border-style:none;">
                            <div>
                                <button style="border-style:none;"><a href="flight.php?action=edit&maCB=<?php echo $row['maChuyenBay'];?>">Sửa</a></button>                             
                            </div>
                            <div>
                                <button style="border-style:none;"><a onclick="return confirm('Bạn có chắc là muốn xóa không ?')" href="flight.php?action=delete&maCB=<?php echo $row['maChuyenBay'];?>">Xóa</a></button>                               
                            </div>
                        </td> 
                    </tr>          
                <?php 
                }
                ?>            
        </table>
        <!--Nhìn thông báo là biết rồi :)))  -->
        <?php
            if($count=='0')
                echo "Không tìm thấy dữ liệu theo từ khóa tìm kiếm";
        ?>
    </center>
</form>
</div>
<!-- Bắt đầu danh sách phân trang -->
<!-- <div <?php if($count=='0') echo 'style="display:none;"';?>> -->
    <div layout="row" layout-align="center center">
            <?php
                $sql="select * from chuyenbay";
                $rows=query($sql);
                $tongSoChuyenBay=mysqli_num_rows($rows);        
                $tongSoTrang=ceil($tongSoChuyenBay/$soChuyenBayTrenTrang);            
                for ($i=1; $i<=$tongSoTrang ; $i++)
                {
            ?>
                    <a <?php if($i==$trang) echo "style='background-color:#cdcdcd; width: 15px;'"; ?> href="flight.php?trang=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php   
                }
            ?>       
    </div>
<!-- </div> -->
<!-- Kết thúc danh sách số trang -->
