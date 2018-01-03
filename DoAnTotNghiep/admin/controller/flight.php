<?php
    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else {
        $action="";
    }

    if(isset($_GET['maCB'])){
        $maCB=$_GET['maCB'];
    }
    else {
        $maCB="";
    }        
?>
<?php
    switch ($action) {
        case 'new':
            include "view/flight/newFlight.php";
            break;
        case 'insert':
            if($_POST['maChuyenBay']=="" || $_POST['maHangMayBay']=="" || $_POST['maTuyenBay']=="" || $_POST['ngayKhoiHanh']==""
            ||$_POST['ngayDen']==""||$_POST['gioKhoiHanh']==""||$_POST['gioDen']==""||$_POST['trangThai']=="" || $_POST['donGia']=="")
                {
                    echo '<script languague="javascript">';
                        echo 'toastr.warning("Nhập đầy đủ các trường bắt buộc!","Thông báo")';
                    echo '</script>';
                }
            else
                {
                if(is_numeric($_POST['donGia']))
                {
                    $checkMCB=$_POST['maChuyenBay']; 
                    $checkMHV=$_POST['maHangVe'];  
                    //Kiểm tra xem đã thêm vào bảng chuyến bay chưa => Thêm vào bảng hangve_chuyenbay                   
                    $sql="select * from chuyenbay where maChuyenBay='$checkMCB'";
                    $rows=query($sql);
                    $count=mysqli_num_rows($rows);
                        if($count == 0 )
                        {
                            insert();
                        }
                    // Kiểm tra xem mã hạng vé và mã chuyến bay đã tồn tại trong bảng hangve_chuyenbay chưa
                    $sql="select * from hangve_chuyenbay where maChuyenBay='$checkMCB' and maHangVe='$checkMHV'";  
                    // var_dump($sql);         
                    $rows=query($sql);
                    $count=mysqli_num_rows($rows);            
                        if($count == 0)
                        {
                            insertHVCB();
                        }
                        else 
                        {
                            echo '<script languague="javascript">';
                                echo 'toastr.warning("Mã hạng vé và mã chuyến bay bị trùng. Nhập lại!");';
                                // echo 'toastr.clear();';
                            echo '</script>';
                            break;   
                        }                      
                    echo '<script languague="javascript">';
                        echo 'toastr.success("Thêm chuyến bay thành công");';
                        // echo 'toastr.clear();';
                    echo '</script>'; 
                }
                else {
                     echo '<script languague="javascript">';
                         echo 'toastr.warning("Nhập giá vé đúng định dạng số!");';
                     echo '</script>';
                    break; 
                }                                     
                }
                break;
        case 'edit':   
                $sql="SELECT tb.maTuyenBay,tb.noiDi,tb.noiDen, cb.maChuyenBay, cb.ngayKhoiHanh, cb.ngayDen, cb.gioKhoiHanh,cb.gioDen, cb.trangThai, hmb.*, hvcb.maHangVe, hvcb.donGia,hv.tenHangVe
                FROM
                ((tuyenbay as tb join chuyenbay as cb on tb.maTuyenBay=cb.maTuyenBay) 
                join hangmaybay as hmb on cb.maHangMayBay=hmb.maHangMayBay) 
                join hangve_chuyenbay as hvcb on cb.maChuyenBay=hvcb.maChuyenBay 
                join hangve as hv on hvcb.maHangVe=hv.maHangVe
                where cb.maChuyenBay='$maCB'";
                $rows=query($sql);
                $row=mysqli_fetch_array($rows); 
                include("view/flight/editFlight.php");
            break;
        case 'update': 
            if($_POST['maChuyenBay']=="" || $_POST['maHangMayBay']=="" || $_POST['maTuyenBay']=="" || $_POST['ngayKhoiHanh']==""
            ||$_POST['ngayDen']==""||$_POST['gioKhoiHanh']==""||$_POST['gioDen']==""||$_POST['trangThai']=="" ||$_POST['donGia']=="")
                {
                    echo '<script languague="javascript">';
                        echo 'toastr.warning("Nhập đầy đủ các trường bắt buộc!","Thông báo")';                                         
                    echo '</script>';                
                }
                else
                {      
                    if(is_numeric($_POST['donGia']))
                    {
                    $maHV=$_POST['maHangVe'];
                    //Khi mã chuyến bay thay đổi                
                    $checkMaCB=$_POST['maChuyenBay'];                
                        if($checkMaCB != $maCB) 
                        {                    
                            updateBSCBHV($maCB);                    
                        }               
                        update($maCB);
                        updateCBHV($maCB,$maHV);                
                        echo '<script languague="javascript">';                   
                            echo 'toastr.success("Cập nhật chuyến bay thành công!");';                    
                        echo '</script>';           
                    }
                    else {
                        echo '<script languague="javascript">';
                            echo 'toastr.warning("Nhập giá số đúng định dạng")';                                         
                        echo '</script>';
                        break; 
                    }
                }
                break;             
        case 'delete':           
            {            
            delete($maCB);
            deleteHVCB($maCB);
             echo '<script languague="javascript">';
                echo 'toastr.success("Xóa chuyến bay thành công!");';                
                // echo 'toastr.clear()';
             echo '</script>';                    
            }
            break;        
        default:
            # code...
            break;
    }
?>