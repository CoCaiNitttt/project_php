<?php
$id = $_POST['id'];
$soluong = $_POST['number'];

include 'connect.php';

$sql_select = "select * from sanpham where id = '$id'";
$ket_qua = mysqli_query($connect, $sql_select);
$kq = mysqli_fetch_array($ket_qua);

if($kq['SoLuong'] == 0) {
    $soluongMoi = $kq['SoLuong'] + $soluong;
    $sql = "update sanpham set SoLuong = '$soluongMoi', TrangThai = 1 where id = '$id'";
    mysqli_query($connect, $sql);
}
else {
    $soluongMoi = $kq['SoLuong'] + $soluong;
    $sql = "update sanpham set SoLuong = '$soluongMoi' where id = '$id'";
    mysqli_query($connect, $sql);
}
mysqli_close($connect);
header("location: product.php");

?>