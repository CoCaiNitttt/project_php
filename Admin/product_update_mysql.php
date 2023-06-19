<?php
include 'connect.php';
$id = $_POST['id'];
$loaisp = $_POST['loaisanpham'];
$tensp = $_POST['tensanpham'];
$mota = $_POST['mota'];
$motachitiet = $_POST['motachitiet'];
$nhacc = $_POST['nhacungcap'];
$hinhanh = $_POST['hinhanh'];
$soluong = $_POST['soluong'];
$gia = $_POST['gia'];
$giagiam = $_POST['giagiam'];
$dohot = $_POST['dohot'];


$sql = "update sanpham set
LoaiSP = '$loaisp',
TenSP = '$tensp',
Avatar = '$hinhanh',
MoTa = '$mota',
MoTaChiTiet = '$motachitiet',
NhaCungCap = '$nhacc',
SoLuong = '$soluong',
Gia = '$gia',
GiaGiam = '$giagiam',
level = '$dohot'
where id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: product.php");
?>