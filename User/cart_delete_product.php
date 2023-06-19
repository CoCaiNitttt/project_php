<?php
$id = $_POST['id'];
$soluong = $_POST['soluong'];
$id_sp = $_POST['id_product'];
include 'connect.php';


$sql_select_sp = "select * from sanpham where id = '$id_sp'";
$ket_qua_select_sp = mysqli_query($connect, $sql_select_sp);
$kq_select_sp = mysqli_fetch_array($ket_qua_select_sp);

$soluong_con = $kq_select_sp['SoLuong'] + $soluong;
$soluong_mua = $kq_select_sp['SoLuongMua'] - $soluong;
if($kq_select_sp['SoLuong'] == 0) {
    $sql_update_soluong = "update sanpham set SoLuong = '$soluong_con', SoLuongMua = '$soluong_mua', TrangThai = 1 where id = '$id_sp'";
    mysqli_query($connect, $sql_update_soluong);
}
else {
    $sql_update_soluong = "update sanpham set SoLuong = '$soluong_con', SoLuongMua = '$soluong_mua' where id = '$id_sp'";
    mysqli_query($connect, $sql_update_soluong);
}



$sql = "delete from giohang where id_SanPham = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: cart_product.php");
?>