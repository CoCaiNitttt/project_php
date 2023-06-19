<?php
session_start();
$arr = $_SESSION['arr_admin'];
    include 'connect.php';


    $id = $arr['id'];
    $hoten = $_POST['hoten'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $gioitinh = $_POST['gioitinh'];
    $hinhanh = $_POST['hinhanh'];

    $sql = "update admin set
    HoTen = '$hoten',
    DiaChi = '$diachi',
    SoDienThoai = '$sodienthoai',
    Email = '$email',
    GioiTinh = '$gioitinh',
    HinhAnh = '$hinhanh'
    where id = '$id'";

    $admin = ['id' => $id, 'HoTen' => $hoten, 'DiaChi' => $diachi, 'SoDienThoai' => $sodienthoai, 'Email' => $email, 'GioiTinh' => $gioitinh, 'HinhAnh' => $hinhanh];
    $_SESSION['arr_admin'] = $admin;

    

    mysqli_query($connect, $sql);
    mysqli_close($connect);
    header("location: TrangChu.php");