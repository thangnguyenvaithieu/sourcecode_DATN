<?php
    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else {
        $action="";
    }
    if(isset($_GET['maSB'])){
        $maSB=$_GET['maSB'];
    }
    else {
        $maSB="";
    }
?>
<?php
    switch ($action) {
        case 'new':
            include "view/airport/newAirport.php";
            break;
        case 'insert':
        if($_POST['maSanBay']=="" || $_POST['tenSanBay']=="" || $_POST['trangThai']=="")
            {
                echo '<script languague="javascript">';
                    echo 'toastr.warning("Nhập đầy đủ các trường bắt buộc!","Thông báo")';
                echo '</script>';
            }
        else  
            {
            $checkMSB=$_POST['maSanBay'];
            $sql="select * from sanbay where maSanBay='$checkMSB'";
            $rows=query($sql);
            $count=mysqli_num_rows($rows);
            if($count == 0)
                {
                    insert();                
                }
            else 
                {
                    echo '<script languague="javascript">';
                        echo 'toastr.warning("Sân bay đã tồn tại!");';
                        // echo 'toastr.clear()'; 
                    echo '</script>';
                    break;  
                }          
            echo '<script languague="javascript">';
                    echo 'toastr.success("Thêm sân bay thành công");';
                    // echo 'toastr.clear()';
           echo '</script>';  
            }          
            // header("location:airport.php");          
            break;
        case 'edit':   
            $sql="select * from sanbay where maSanBay='$maSB'";
            $rows=query($sql);
            $row=mysqli_fetch_array($rows);            
            include("view/airport/editAirport.php");
            break;
        case 'update':
        if($_POST['maSanBay']=="" || $_POST['tenSanBay']=="" || $_POST['trangThai']=="")
            {
                echo '<script languague="javascript">';
                    echo 'toastr.warning("Nhập đầy đủ các trường bắt buộc!","Thông báo")';
                echo '</script>';
            }
        else  
            {                     
            update($maSB);
            echo '<script languague="javascript">';
                    echo 'toastr.success("Cập nhật sân bay thành công!");';
                    // echo 'toastr.clear()';   
                    
            echo '</script>';
            }
            // header("location:airport.php");         
            break;             
        case 'delete': 
            {                                
            delete($maSB);
            echo '<script languague="javascript">';
                echo 'toastr.success("Xóa sân bay thành công!");';
                //echo 'toastr.clear()';    
                
            echo '</script>'; 
            }       
            // // header("location:airport.php");
        default:
            // header("location:airport.php");
        break;
    }
?>