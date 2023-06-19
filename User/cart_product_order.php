<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Đặt hàng</title>
    <style>
        .frame_order .body{
            display: flex;
        }
        .frame_order .body .body_right{
            width: 96%;
            margin-left: 2%;
        }
        .frame_order .body .body_right_top{
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .frame_order .body .body_right_bottom table{
            width: 100%;
        }
        .frame_order .body .body_right_bottom table th{
            height: 25px;
        }
        .frame_order .body .body_right_bottom table td{
            height: 30px;
        }
    </style>
</head>
<body>
    <?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y/m/d H:i:s');

    $id_account = 0;
    if(isset($_SESSION['arr_user'])) {
        $arr = $_SESSION['arr_user'];
        $id_account = $arr['id'];
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    include 'connect.php';

    $sql_insert_hoadon = "insert into donhang(TenKhachHang, DiaChi, Email, SoDienThoai, TrangThai, NgayTao, id_account) values('$name', '$address', '$email', '$phone', 0, '$date', '$id_account')";
    mysqli_query($connect, $sql_insert_hoadon);

    $sql_select_ma_hoadon = "select * from donhang where NgayTao = '$date'";
    $ket_qua_ma_hoadon = mysqli_query($connect, $sql_select_ma_hoadon);
    $kq_ma_hoadon = mysqli_fetch_array($ket_qua_ma_hoadon);
    $ma_hoa_don = 0;
    if($kq_ma_hoadon != null) {
        $ma_hoa_don = $kq_ma_hoadon['id'];
    }

    $sql_update_ma_hoadon = "update giohang set id_DonHang = '$ma_hoa_don' where TrangThai = 0";
    mysqli_query($connect, $sql_update_ma_hoadon);


    $sql_select_hoadon = "select * from donhang
                          inner join giohang on donhang.id = giohang.id_DonHang
                          inner join sanpham on giohang.id_SanPham = sanpham.id
                          where giohang.id_account = '$id_account' and giohang.id_DonHang = '$ma_hoa_don'";
    $ket_qua_hoa_don = mysqli_query($connect, $sql_select_hoadon);
    $kq_hoa_don = mysqli_fetch_array($ket_qua_hoa_don);


    // update sl nhieu san pham
    // foreach($ket_qua_hoa_don as $value) {
    //     $id_sp = $value['id_SanPham'];
    //     $soluong_con = $value['SoLuong'] - $value['SoLuongBan'];
    //     $soluong_mua = $value['SoLuongMua'] + $value['SoLuongBan'];
    //     if($soluong_con == 0) {
    //         $sql_update_soluong = "update sanpham set SoLuong = '$soluong_con', SoLuongMua = '$soluong_mua', TrangThai = 0 where id = '$id_sp'";
    //         mysqli_query($connect, $sql_update_soluong);
    //     }
    //     else {
    //        $sql_update_soluong = "update sanpham set SoLuong = '$soluong_con', SoLuongMua = '$soluong_mua' where id = '$id_sp'";
    //        mysqli_query($connect, $sql_update_soluong);
    //     }
    // }


    $sql_update_cart = "update giohang set TrangThai = 1 where id_DonHang = '$ma_hoa_don'";
    mysqli_query($connect, $sql_update_cart);

   ?>
<div class="frame_order">
<div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="title">
            <h2 style="color: darkgreen; margin-top: 120px;margin-left: 40px;"><i>Đặt hàng thành công</i></h2>
        </div>
        <div class="body">
            <div class="body_right">
                <div class="body_right_top">
                <div class="title">
                </div>
                </div>
                <div class="body_right_bottom" style="width: 80%; margin-left: 10%;">
                    <div style="display: flex; justify-content: center; margin-bottom: 10px;" class="title"><h2>CHI TIẾT HOÁ ĐƠN</h2></div>
                    <table style="text-align: left;width: 800px; height: 180px;">
                        <tr>
                            <th style="width: 140px;">Mã đơn hàng: </th>
                            <th><input value="<?php echo $ma_hoa_don ?>" style="width: 100%; outline: none; border: none;" type="text" name="ma"></th>
                        </tr>
                        <tr>
                            <th>Tên khách hàng: </th> 
                            <th><input value="<?php echo $_POST['name'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="name"></th>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <th><input  value="<?php echo $_POST['email'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="email"></th>
                        </tr>
                        <tr>
                            <th>Số điện thoại: </th>
                            <th><input  value="<?php echo $_POST['phone'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="phone"></th>
                        </tr>
                        <tr>
                            <th>Địa chỉ: </th>
                            <th><input  value="<?php echo $_POST['address'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="address"></th>
                        </tr>
                        <tr>
                            <th>Ngày đặt hàng: </th>
                            <th><input  value="<?php echo $date ?>" style="width: 100%; outline: none; border: none;" type="text" name="day"></th>
                        </tr>
                    </table>
                    <table border="1" style=" margin-top: 20px;border-collapse: collapse; text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php $tong = 0; $stt = 0; foreach($ket_qua_hoa_don as $value) { $stt++; ?>
                            <tr>
                                <td><?php echo $stt?></td>
                                <td><?php echo  $value['TenSP']?></td>
                                <td><?php echo  $value['SoLuongBan']?></td>
                                <td><?php echo number_format(($value['Gia'] - $value['GiaGiam']), 0, '.', '.')." đ"?></td>
                                <td><?php $tien = $value['SoLuongBan'] * ($value['Gia'] - $value['GiaGiam']); $tong += $tien; echo number_format($tien, 0, '.', '.')." đ"; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div style="margin-top: 40px; margin-left: 75%; font-size: 18px;">
                        Tổng cộng: <?php echo number_format($tong, 0, '.', '.')." đ"; ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%; font-size: 18px;">
                        Voucher giảm giá: <?php if($_POST['discount_code'] != null) {
                            $ma = $_POST['discount_code'];
                            $sql_giamgia = "select * from magiamgia where code = '$ma' and TrangThai = 1";
                            $ket_qua_voucher = mysqli_query($connect, $sql_giamgia);
                            $kq_voucher = mysqli_fetch_array($ket_qua_voucher);


                            if(isset($kq_voucher) && $tong >= $kq_voucher['DonHangToiThieu']) {
                                $id_magiamgia = $kq_voucher['id'];
                                echo number_format($kq_voucher['SoTienGiam'], 0, '.', '.')." đ";

                                $solandanhap = $kq_voucher['SoLanDaNhap'] + 1;
                                if($solandanhap >= $kq_voucher['SoLanNhap']) {
                                    $sql_update_voucher1 = "update magiamgia set SoLanDaNhap = '$solandanhap', TrangThai = 0 where code = '$ma'";
                                    mysqli_query($connect, $sql_update_voucher1);
                                }
                                else {
                                    $sql_update_voucher2 = "update magiamgia set SoLanDaNhap = '$solandanhap' where code = '$ma'";
                                    mysqli_query($connect, $sql_update_voucher2);
                                }

                                
                            }
                            else {
                                echo "0 đ";
                            }
                        }
                        else {
                            echo "0 đ";
                        }
                        ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%;">
                        Phí vận chuyển: <?php echo "30.000 đ" ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%; font-size: 18px; font-weight: 700;">
                        
                        Thành tiền: <?php
                        if(isset($kq_voucher) && $tong >= $kq_voucher['DonHangToiThieu']) {
                            $thanhtien = $tong - $kq_voucher['SoTienGiam'] + 30000;
                            echo number_format($thanhtien, 0, '.', '.')." đ";

                            $sql_update_donhang = "update donhang set id_magiamgia = '$id_magiamgia',TongTien = '$thanhtien' where id = '$ma_hoa_don'";
                            mysqli_query($connect, $sql_update_donhang);
                        }
                        else {
                            $thanhtien = $tong + 30000;
                            echo number_format($thanhtien, 0, '.', '.')." đ";
                            $sql_update_donhang = "update donhang set TongTien = '$thanhtien' where id = '$ma_hoa_don'";
                            mysqli_query($connect, $sql_update_donhang);
                        }
                         
                        ?>
                    </div>
                    <div  style=" font-size: 20px; margin-top: 20px; margin-left: 85%;" class="print">
                    <button style="height: 30px; width: 120px; color: white;background-color: deepskyblue;border: none;cursor: pointer; border-radius: 5px;"><a style="text-decoration: none;" href="TrangChu.php">Trở về</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mysqli_close($connect) ?>
</body>
</html>