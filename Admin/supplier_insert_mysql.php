<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
include 'connect.php';
$ten = $_POST['ten'];
$diachi = $_POST['diachi'];
$phone = $_POST['sodienthoai'];

$sql = "insert into nhacungcap(TenNhaCungCap, DiaChi, SoDienThoai, NgayTao) values('$ten', '$diachi', '$phone', '$date')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: supplier.php");
?>