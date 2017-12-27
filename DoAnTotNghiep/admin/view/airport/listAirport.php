<div style="text-align:center">
    <h5><a href="airport.php?action=new">Thêm sân bay</a></h5>
</div>
 <h4>Danh sách sân bay</h4>
<!-- Form tìm kiếm theo tên sân bay -->
<!-- <div> -->
    <form action="airport.php" method="GET">
        <div layout="row">
            <div>
                <md-input-container class="md-block">
                    <label style="font-weight:bold;">Tìm kiếm theo tên sân bay:</label>
                    <input type="text" style="width: 500px;" name="test" id="keyword" maxlength="255">              
                </md-input-container>
            </div>
            <div> 
                <md-button class="md-primary md-raised" style="font-weight:normal;" type="submit"> 
                        Tìm kiếm
                </md-button>  
            </div>  
        </div>        
    </form>
<!-- </div>                     -->
<!-- Kết thúc form tìm kiếm  theo tên sân bay-->
<!-- Form hiển thị trang chính airport -->
<div class="container table-responsive">
    <form action="" method="POST">
        <center>
            <table class=" table table-bordered table-hover text-center">
                <tr style="background:#cdcdcd;">
                <th>Mã sân bay</th>
                <th>Tên sân bay</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>            
                </tr>           
                <?php                               
                    if(!isset($_GET['keyword']))
                    {
                        // $sql="select * from sanbay order by maSanBay asc";
                        
                        $soSanBayTrenTrang = 10;
                        if(isset($_GET['trang']))
                        {
                            $trang=$_GET['trang'];
                            settype($trang,"int");
                        }
                        else {
                            $trang=1;
                        }
                        $trangHienTai=($trang-1)*$soSanBayTrenTrang;
                        $sql="select * from sanbay order by maSanBay desc limit $trangHienTai,$soSanBayTrenTrang";                
                    }
                    if(isset($_GET['test']))              
                    {
                        $keyword = $_GET['test'];
                        $sql = "select * from sanbay where tenSanBay like '%$keyword%'";                                     
                    }
                    // echo '<h1>'.$sql.'</h1>';
                    // die;
                        $rows = query($sql); 
                        // var_dump($rows);
                        $count=mysqli_num_rows($rows);
                        // var_dump($count);
                        while($row = mysqli_fetch_array($rows))
                        {
                            // $count=mysqli_num_rows($row);                           
                        ?>
                            <tr>
                                <td><?php echo $row['maSanBay'] ?></td>
                                <td><?php echo $row['tenSanBay'] ?></td>
                                <td>
                                    <?php if($row['trangThai']=="1")
                                    echo "Hiện";
                                else {
                                    echo "Ẩn";
                                    } ?>
                                </td> 
                                <td>
                                    <button style="border-style:none;"><a href="airport.php?action=edit&maSB=<?php echo $row['maSanBay'];?>">Sửa</a></button> 
                                    <button style="border-style:none;"><a onclick="return confirm('Bạn có chắc là muốn xóa không ?')" href="airport.php?action=delete&maSB=<?php echo $row['maSanBay'];?>">Xóa</a> </button>                
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
<!-- Kết thúc form hiển thị trang airport -->
<!-- Danh sách số trang -->
<div <?php if($count=='0') echo 'style="display:none;"';?>>
    <div layout="row" layout-align="center center">
            <?php
                $sql="select * from sanbay";
                $rows=query($sql);
                $tongSoSanBay=mysqli_num_rows($rows);
                // var_dump($tongSoSanBay);
                $tongSoTrang=ceil($tongSoSanBay/$soSanBayTrenTrang);          
                for ($i=1; $i<=$tongSoTrang ; $i++)
                {
            ?>
                    <a <?php if($i==$trang) echo "style='background-color:#cdcdcd; width: 15px;'"; ?> href="airport.php?trang=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php   
                }
            ?>       
    </div>
</div>
<!-- Kết thúc danh sách số trang -->




