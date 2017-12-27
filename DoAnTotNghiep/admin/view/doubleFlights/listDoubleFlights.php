<div style="text-align:center">
    <h5><a href="doubleFlights.php?action=new">Thêm tuyến bay</a></h5>
</div>
 <h4>Danh sách tuyến bay</h4>
<!-- "background-color: rgb(63,81,181); color:white;"> 
background:#cdcdcd;
-->
<!-- Bắt đầu form tìm kiếm tuyến bay theo sân bay đi hoặc sân bay đến -->
<div>
    <form action="doubleFlights.php" method="GET">
        <div layout="row">
            <div>
                <md-input-container class="md-block">
                    <label style="font-weight:bold;">Tìm kiếm tuyến bay theo nơi đi(nơi đến):</label>
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
            <th>Mã tuyến bay</th>
            <th>Sân bay đi</th>
            <th>Sân bay đến</th>
            <th>Trạng thái</th>            
            <th>Thao tác</th>
            </tr>           
                <?php                
                 if(!isset($_GET['keyword']))
                    {
                        // $sql="select * from sanbay order by maSanBay asc";
                        $soTuyenBayTrenTrang=10;
                        if(isset($_GET['trang']))
                        {
                            $trang=$_GET['trang'];
                            settype($trang,"int");
                        }
                        else {
                            $trang=1;
                        }
                        $trangHienTai=($trang-1)*$soTuyenBayTrenTrang;
                        $sql="select * from tuyenbay order by maTuyenBay desc limit $trangHienTai,$soTuyenBayTrenTrang";                
                    }
                    
                    if(isset($_GET['test']))
                    {
                        $keyword=$_GET['test'];
                        $sql="select * from tuyenbay where noiDi like '%$keyword%' || noiDen like '%$keyword%'";                            
                    }
                        $rows=query($sql);
                        $count=mysqli_num_rows($rows);
                        // var_dump($count);                                              
                        while($row=mysqli_fetch_array($rows))
                        {    
                      ?>
                     <tr>
                        <td><?php echo $row['maTuyenBay'] ?></td>
                        <td><?php echo $row['noiDi']; ?></td>
                        <td><?php echo $row['noiDen'] ?></td>                        
                        <td>
                            <?php if($row['trangThai']=="1")
                            echo "Hiện";
                        else {
                            echo "Ẩn";
                            } ?>
                        </td> 
                        <td>                            
                            <button style="border-style:none;"><a href="doubleFlights.php?action=edit&maTB=<?php echo $row['maTuyenBay'];?>">Sửa</a></button> 
                            <button style="border-style:none;"><a onclick="return confirm('Bạn có chắc là muốn xóa không ?')" href="doubleFlights.php?action=delete&maTB=<?php echo $row['maTuyenBay'];?>">Xóa</a> </button>                
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
                $sql="select * from tuyenbay";
                $rows=query($sql);
                $tongSoTuyenBay=mysqli_num_rows($rows);                            
                $tongSoTrang=ceil($tongSoTuyenBay/$soTuyenBayTrenTrang);            
                for ($i=1; $i<=$tongSoTrang ; $i++)
                {
            ?>
                    <a <?php if($i==$trang) echo "style='background-color:#cdcdcd; width: 15px;'"; ?> href="doubleFlights.php?trang=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php   
                }
            ?>       
    </div>
<!-- </div> -->
<!-- Kết thúc danh sách số trang -->