<?php
session_start();
$arr = $_SESSION['arr_user'];
$id = $arr['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$sex = $_POST['sex'];

include 'connect.php';
$sql = "update account set HoTen = '$name', DiaChi = '$address', GioiTinh = '$sex' where id = '$id'";
mysqli_query($connect, $sql);

$sql_select = "select * from account where id = '$id'";
$ket_qua = mysqli_query($connect, $sql_select);
$kq = mysqli_fetch_array($ket_qua);


$user = ['id' => $kq['id'], 'name' => $kq['HoTen'], 'phone' => $kq['SoDienThoai'], 'email' => $kq['Email'], 'address' => $kq['DiaChi'], 'sex' => $kq['GioiTinh']];
$_SESSION['arr_user'] = $user;

mysqli_close($connect);
header("location: TrangChu.php");
?>