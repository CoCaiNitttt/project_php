<?php
session_start();
$_SESSION['check_account'] = 0;

$account = $_POST['account'];
$password = $_POST['password'];

include 'connect.php';
$sql = "select * from account where role = 1 and TaiKhoan = '$account'";
$ket_qua = mysqli_query($connect, $sql);
$kq = mysqli_fetch_array($ket_qua);


if($kq != null) {
    if($password == $kq['MatKhau']) {
        $admin = ['id' => $kq['id'], 'HoTen' => $kq['HoTen'], 'DiaChi' => $kq['DiaChi'], 'SoDienThoai' => $kq['SoDienThoai'], 'Email' => $kq['Email'], 'GioiTinh' => $kq['GioiTinh']];
        $_SESSION['arr_admin'] = $admin;
        header("location: TrangChu.php");
    }
    else {
        $_SESSION['check_account'] = 1;
       header("location: login.php");
    }
}
else {
    $_SESSION['check_account'] = 2;
    header("location: login.php");
}
mysqli_close($connect);
?>