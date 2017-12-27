<?php
include "queryDB.php";

function dsNoiDi()
{
    $sql="SELECT DISTINCT noiDi FROM tuyenbay";
    return query($sql);
}

function dsNoiDen()
{
    $sql="SELECT DISTINCT noiDen FROM tuyenbay";
    return query($sql);
}

function htNoiDenTheoNoiDi($tenSB)
{
    $sql="select noiDen from tuyenbay where noiDi='$tenSB'";
    return query($sql);
}

function dsHangVe()
{
    $sql="select maHangVe, tenHangVe from hangve";
    return query($sql);
};

// Lay ma tuyen bay
function layMatb($noiDi,$noiDen)
{
    $sql="select maTuyenBay from tuyenbay where noiDi='$noiDi' and noiDen='$noiDen'";
    return query($sql);
}

// Lay chuyen bay
function layChuyenBay($maTB,$ngayDi)
{
    $sql="select maChuyenBay from chuyenbay where maTuyenBay='$maTB' and ngayKhoiHanh='$ngayDi'";
    return query($sql);
}

// Lay dayn du thong tin chuyen bay
function layCTCB($maCB,$maHV)
{
    $sql="SELECT hmb.maHangMayBay,hmb.tenHangMayBay, cb.maChuyenBay, cb.ngayKhoiHanh, cb.ngayDen, cb.gioKhoiHanh,cb.gioDen, hv.tenHangVe, hvcb.donGia
    FROM  chuyenbay as cb JOIN hangve_chuyenbay as hvcb on cb.maChuyenBay=hvcb.maChuyenBay join hangmaybay as hmb on cb.maHangMayBay=hmb.maHangMayBay join hangve as hv on hvcb.maHangVe=hv.maHangVe
    WHERE cb.maChuyenBay='$maCB' AND hvcb.maHangVe='$maHV'";
    // return var_dump($sql);
    // exit();
    return query($sql);
}

function layGiaVe($maCB,$maHV)
{
    $sql="SELECT donGia FROM hangve_chuyenbay WHERE maChuyenBay='$maCB' AND maHangVe='$maHV'";
    return query($sql);
}


function LayThuBatKyTrongNam($dt,$mt,$yr)
{
    $we = cal_to_jd(CAL_GREGORIAN, $mt, $dt, $yr);
    $n = jddayofweek($we, 0);
    if ($n == 0) {
        $thu= "Chủ nhật";
    } else if ($n == 1) {
        $thu= "Thứ 2";
    } else if ($n == 2) {
        $thu= "Thứ 3";
    } else if ($n == 3) {
        $thu= "Thứ 4";
    } else if ($n == 4) {
        $thu= "Thứ 5";
    } else if ($n == 5) {
        $thu= "Thứ 6";
    } else if ($n == 6) {
        $thu= "Thứ 7";
    }
    return $thu;
}
?>