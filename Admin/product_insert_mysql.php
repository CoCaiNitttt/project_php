<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
include 'connect.php';

$loaisp = $_POST['loaisanpham'];
$tensp = $_POST['tensanpham'];
$mota = $_POST['mota'];
$motachitiet = $_POST['motachitiet'];
$nhacc = $_POST['nhacungcap'];
$hinhanh = $_POST['hinhanh'];
$soluong = $_POST['soluong'];
$gia = $_POST['gia'];
$giagiam = $_POST['giagiam'];
$giaban = $gia - $giagiam;
$dohot = $_POST['dohot'];


$sql = "insert into sanpham(LoaiSP, TenSP, Avatar, Mota, MoTaChiTiet, NhaCungCap, SoLuong, Gia, GiaGiam, GiaBan, NgayTao, TrangThai, level)
values('$loaisp', '$tensp', '$hinhanh', '$mota', '$motachitiet', '$nhacc', '$soluong', '$gia', '$giagiam', '$giaban', '$date', 1, '$dohot')";

mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: product.php");
?>