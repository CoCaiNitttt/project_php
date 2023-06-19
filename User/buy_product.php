<?php
include 'connect.php';
$soluong = $_POST['soluong_mua'];
$id_sp = $_POST['id_product'];
$id_account = $_POST['id_user'];




$sql_select_sp = "select * from sanpham where id = '$id_sp'";
$ket_qua_select_sp = mysqli_query($connect, $sql_select_sp);
$kq_select_sp = mysqli_fetch_array($ket_qua_select_sp);

$soluong_con = $kq_select_sp['SoLuong'] - $soluong;
$soluong_mua = $kq_select_sp['SoLuongMua'] + $soluong;
if($soluong_con == 0) {
    $sql_update_soluong = "update sanpham set SoLuong = '$soluong_con', SoLuongMua = '$soluong_mua', TrangThai = 0 where id = '$id_sp'";
    mysqli_query($connect, $sql_update_soluong);
}
else {
    $sql_update_soluong = "update sanpham set SoLuong = '$soluong_con', SoLuongMua = '$soluong_mua' where id = '$id_sp'";
    mysqli_query($connect, $sql_update_soluong);
}





$sql_check_sanpham = "select * from giohang where id_SanPham = '$id_sp' and TrangThai = 0";
$ket_qua_check_sanpham = mysqli_query($connect, $sql_check_sanpham);
$kq_check_sanpham = mysqli_fetch_array($ket_qua_check_sanpham);
if(isset($kq_check_sanpham['SoLuongBan'])) {
    $SoLuongMoi = $soluong + $kq_check_sanpham['SoLuongBan'];
    $sql_update = "update giohang set SoLuongBan = '$SoLuongMoi' where id_SanPham = '$id_sp' and TrangThai = 0";
    mysqli_query($connect, $sql_update);
}
else {
    $sql_sanpham = "select * from sanpham where id = '$id_sp' and TrangThai = 1";
    $ket_qua_sp = mysqli_query($connect, $sql_sanpham);
    $kq_sp = mysqli_fetch_array($ket_qua_sp);

    $dongia = $kq_sp['Gia'] - $kq_sp['GiaGiam'];

    $sql_giohang = "insert into giohang(id_SanPham, id_account, DonGiaBan, SoLuongBan, TrangThai) values('$id_sp', '$id_account', '$dongia', '$soluong', 0)";
    mysqli_query($connect, $sql_giohang);
}


mysqli_close($connect);
header("location: cart_product.php");
?>