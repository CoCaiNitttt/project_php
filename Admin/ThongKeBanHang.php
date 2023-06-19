<?php

include 'connect.php';

$sql_inner_join_giohang = "select * from donhang inner join giohang on donhang.id = giohang.id_DonHang where donhang.TrangThai = 2";
$kq_inner_join_giohang = mysqli_query($connect, $sql_inner_join_giohang);

$sql_donhang = "select * from donhang where TrangThai = 2";
$kq_donhang = mysqli_query($connect, $sql_donhang);


$total2019 = 0;
$total2020 = 0;
$total2021 = 0;
$total2022 = 0;
$total2023 = 0;

$order2019 = 0;
$order2020 = 0;
$order2021 = 0;
$order2022 = 0;
$order2023 = 0;

$quantity2019 = 0;
$quantity2020 = 0;
$quantity2021 = 0;
$quantity2022 = 0;
$quantity2023 = 0;


foreach($kq_inner_join_giohang as $value) {
    $date = $value['NgayTao'];
    $arr = explode('-', $date);
    $year = $arr[0];
    if($year == 2019) {
        $quantity2019 += $value['SoLuongBan'];
    }
    if($year == 2020) {
        $quantity2020 += $value['SoLuongBan'];
    }
    if($year == 2021) {
        $quantity2021 += $value['SoLuongBan'];
    }
    if($year == 2022) {
        $quantity2022 += $value['SoLuongBan'];
    }
    if($year == 2023) {
        $quantity2023 += $value['SoLuongBan'];
    }
}


foreach($kq_donhang as $value) {
    $date = $value['NgayTao'];
    $arr = explode('-', $date);
    $year = $arr[0];
    if($year == 2019) {
        $total2019 += $value['TongTien'];
        $order2019++;
    }
    if($year == 2020) {
        $total2020 += $value['TongTien'];
        $order2020++;
    }
    if($year == 2021) {
        $total2021 += $value['TongTien'];
        $order2021++;
    }
    if($year == 2022) {
        $total2022 += $value['TongTien'];
        $order2022++;
    }
    if($year == 2023) {
        $total2023 += $value['TongTien'];
        $order2023++;
    }
}


$arr2019 = [$total2019, $order2019, $quantity2019];
$arr2020 = [$total2020, $order2020, $quantity2020];
$arr2021 = [$total2021, $order2021, $quantity2021];
$arr2022 = [$total2022, $order2022, $quantity2022];
$arr2023 = [$total2023, $order2023, $quantity2023];


mysqli_close($connect);
?>