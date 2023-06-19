<?php
$id = $_POST['id'];
include 'connect.php';


$sql_select_hoadon = "select * from donhang
                        inner join giohang on donhang.id = giohang.id_DonHang
                        inner join sanpham on giohang.id_SanPham = sanpham.id
                        where donhang.id = '$id' and donhang.TrangThai = 0 or donhang.TrangThai = 1";
$ket_qua_hoa_don = mysqli_query($connect, $sql_select_hoadon);

// update lại sản phẩm
foreach($ket_qua_hoa_don as $value) {
    $id_sp = $value['id_SanPham'];
    $soluong_con = $value['SoLuong'] + $value['SoLuongBan'];
    $soluong_mua = $value['SoLuongMua'] - $value['SoLuongBan'];

    $sql_update_soluong = "update sanpham set SoLuong = '$soluong_con', SoLuongMua = '$soluong_mua', TrangThai = 1 where id = '$id_sp'";
    mysqli_query($connect, $sql_update_soluong);
}

$sql_update = "update donhang set TrangThai = 3 where id = '$id'";
mysqli_query($connect, $sql_update);
mysqli_close($connect);
header("location: follow_all_order.php");
?>