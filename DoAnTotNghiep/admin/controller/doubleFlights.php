<?php
    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else {
        $action="";
    }

    if(isset($_GET['maTB'])){
        $maTB=$_GET['maTB'];
    }
    else {
        $maTB="";
    } 

    if (isset($_GET['maSBDiCu'])) {
        $maSanBayDiCu=$_GET['maSBDiCu'];
    } else {
         $maSanBayDiCu="";
    }

    if (isset($_GET['maSBDenCu'])) {
        $maSanBayDenCu=$_GET['maSBDenCu'];
    } else {
        $maSanBayDenCu="";
    }  
?>
<?php
    switch ($action) {
        case 'new':
            include "view/doubleFlights/newDoubleFlights.php";
            break;
        case 'insert':
        if($_POST['maTuyenBay']=="" || $_POST['noiDi']=="" || $_POST['noiDen']=="" || $_POST['trangThai']==""||$_POST['maSanBayDi']==""||$_POST['maSanBayDen']=="")
            {
                echo '<script languague="javascript">';
                    echo 'toastr.warning("Nhập đầy đủ các trường bắt buộc!","Thông báo")';
                echo '</script>';
            }
        else
            {
            $checkMTB=$_POST['maTuyenBay'];
            $sql="select * from tuyenbay where maTuyenBay='$checkMTB'";
            $rows=query($sql);
            $count=mysqli_num_rows($rows);
                if($count != 0)
                {
                    echo '<script languague="javascript">';
                        echo 'toastr.warning("Mã tuyến bay đã tồn tại!");';
                    // echo 'toastr.clear();';
                    echo '</script>';
                    break;
                }
                else 
                {
                    insert();            
                    insertTBSBDi();
                    insertTBSBDen();
                    echo '<script languague="javascript">';
                        echo 'toastr.success("Thêm tuyến bay thành công");';
                    // echo 'toastr.clear();';
                    echo '</script>'; 
                }                            
            }
            break;
        case 'edit':   
            $sql="select * from tuyenbay where maTuyenBay ='$maTB'";
            $rows=query($sql);
            $row=mysqli_fetch_array($rows);
            
            //Lấy mã sân bay đi cũ
            $sqlSB="select * from sanbay where tenSanBay='$row[noiDi]'"; 
            $rowMSBs=query($sqlSB);
            $rowMaSB=mysqli_fetch_row($rowMSBs);
            $maSanBayDiCu=$rowMaSB[0];

            //Lấy mã sân bay đến cũ
            $sqlSB="select * from sanbay where tenSanBay='$row[noiDen]'"; 
            $rowMSBs=query($sqlSB);
            $rowMaSB=mysqli_fetch_row($rowMSBs);
            $maSanBayDenCu=$rowMaSB[0];

            include("view/doubleFlights/editDoubleFlights.php");
            break;
        case 'update': 
            if($_POST['maTuyenBay']=="" || $_POST['noiDi']=="" || $_POST['noiDen']=="" || $_POST['trangThai']=="")
            {
                echo '<script languague="javascript">';
                    echo 'toastr.warning("Nhập đầy đủ các trường bắt buộc!","Thông báo")';
                     // echo 'toastr.clear()';                    
                echo '</script>';
            }
            else
            {           
            update($maTB);
            updateTBSBDi($maTB,$maSanBayDiCu);
            updateTBSBDen($maTB,$maSanBayDenCu); 
            echo '<script languague="javascript">';                   
                 echo 'toastr.success("Cập nhật tuyến bay thành công!");';                    
            echo '</script>';           
            }
            break;             
        case 'delete':           
            {            
            delete($maTB);
            deleteTBSB($maTB);
             echo '<script languague="javascript">';
                echo 'toastr.success("Xóa tuyến bay thành công!");';
                // echo 'toastr.remove();';
                // echo 'toastr.clear()';
             echo '</script>';                    
            }
            break;        
        default:
            # code...
            break;
    }
?>