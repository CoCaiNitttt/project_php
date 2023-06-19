
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.min.css">
    <title>Giỏ hàng</title>
    <style>
        .frame_cart_product{
            margin-top: 150px;
            width: 100%;
        }
        .frame_cart_product_body{
            width: 90%;
            margin-left: 5%;
            display: flex;
            justify-content: space-between;
            min-height: 280px;
        }
        .frame_cart_product .frame_cart_product_body .body_left caption{
            text-align: left;
            background: goldenrod;
            height: 50px;
            padding-left: 50px;
            padding-top: 15px;
            margin-bottom: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .frame_cart_product .frame_cart_product_body .body_left{
            width: 75%;
            border: 1px solid black;
            border-radius: 10px;

        }
        .frame_cart_product .frame_cart_product_body .body_left table{
            width: 100%;
            margin-bottom: 20px;
        }
        .frame_cart_product .frame_cart_product_body .body_right{
            width: 20%;
            border: 1px solid black;
            border-radius: 10px;
        }
        .frame_cart_product .frame_cart_product_body .body_right .body_right_money{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="frame_cart_product">
        <div class="frame_cart_product_header">
            <?php include 'header.php' ?>
        </div>
        
        <?php
    $id_User = 0;
    if(isset($_SESSION['arr_user'])) {
        $arr = $_SESSION['arr_user'];
        $id_User = $arr['id'];
    }
    include 'connect.php';
    $sql = "select * from giohang inner join sanpham where id_account = '$id_User' and giohang.id_SanPham = sanpham.id and giohang.TrangThai = 0";
    $kq = mysqli_query($connect, $sql);
    
    $ket_qua = mysqli_fetch_array($kq);

    
    ?>
        <?php if(isset($_SESSION['arr_user'])) { ?>
            <div class="follow">
            <button style="height: 24px; width: 140px; border-radius: 10px; margin-left: 76px;outline: none; background: red;border: none;margin-bottom: 20px; margin-left: 88%;"><a style="text-decoration: none; color: white;" href="follow_all_order.php">Theo dõi đơn hàng</a></button>
        </div>
            <div class="frame_cart_product_body">
            <div class="body_left">
                <table>
                    <caption><h3>THÔNG TIN GIỎ HÀNG</h3></caption>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Xoá</th>
                    </tr>
                   <?php $tong = 0; if(isset($ket_qua)) { ?>
                    <?php 
                    
                    $stt = 0;
                    foreach($kq as $value) {
                        $stt++;
                    ?>
                    <tr style="font-size: 14px;">
                        <th><?php echo $stt ?></th>
                        <th><img style="height: 100px; width: 80px;" src="/image/<?php echo $value['Avatar'] ?>" alt=""></th>
                        <th><?php echo $value['TenSP'] ?></th>
                        <th><?php echo $value['SoLuongBan'] ?></th>
                        <th><?php echo number_format($value['DonGiaBan'], 0, '.', '.')." đ" ?></th>
                        <th><?php $tong += ($value['SoLuongBan'] * $value['DonGiaBan']); echo number_format(($value['SoLuongBan'] * $value['DonGiaBan']), 0, '.', '.')." đ" ?></th>
                        <th>
                            <form action="cart_delete_product.php" method="post" onsubmit="return check()">
                                <input hidden type="text" name="id_product" value="<?php echo $value['id_SanPham'] ?>">
                                <input hidden type="text" name="soluong" value="<?php echo $value['SoLuongBan'] ?>">
                                <input hidden name="id"  type="text" value="<?php echo $value['id'] ?>">
                                <button type="submit" style="border: none; cursor: pointer;"><i class="fa-sharp fa-solid fa-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                    <?php } ?>
                  <?php  } else {  ?>
                    <tr>
                        <th style="height: 180px;" colspan="7"><i style="font-size: 100px;" class="fa-solid fa-poo"></i></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <?php if($tong != 0) { ?>
                <div class="body_right">
                <div class="body_right_money">
                    <div class="title" style="margin-top: 20px;margin-left: 5px;">
                        <h2>Tổng tiền:</h2>
                    </div>
                    <div class="price" style="margin-top: 27px;margin-right: 5px;font-size: 18px;">
                        <?php echo number_format($tong, 0, '.', '.')." đ" ?>
                    </div>
                </div>
                <div class="content" style="margin-top: 20px;">
                    <i>Mua hàng trực tiếp tại cửa hàng để nhận được nhiều ưu đãi</i>
                    <p></p>
                </div>
                <div class="order">
                    <button style="height: 24px; width: 262px; margin-left: 5px; margin-top: 20px; border-radius: 10px; border: none;outline: none; background: red;">
                        <a style="text-decoration: none;color: white;" href="cart_product_confirm_info_order.php">Đặt hàng</a>
                    </button>
                </div>
            </div>
           <?php  } ?>
        </div>
        <div class="go_back">
                    <button style="height: 24px; width: 140px; border-radius: 10px; margin-top: 10px; margin-left: 76px;outline: none; background: red;border: none;"><a style="text-decoration: none; color: white;" href="all_product.php">Tiếp tục mua hàng</a></button>
                </div>
        <?php } else {?>
            <div><i style="color: red; margin-left: 10%;">Không có sản phẩm nào trong giỏ hàng</i></div>
            <div class="hollow" style="height: 400px; width: 80%; margin-left: 10%;border: 1px solid red;border-radius: 20px; display: flex; justify-content: center; align-items: center; font-size: 200px;color: red;margin-top: 10px;">
            <a style="color: red;" href="all_product.php"><i class="fa-solid fa-cart-plus"></i></a>
        </div>
            <?php } ?>
        <div class="frame_cart_product_footer">
            <?php include 'footer.php' ?>
        </div>
    </div>
    <script>
        function check() {
            if(confirm('Bạn có muốn xoá sản phẩm này không?') === true) {
                return true;
            }
            return false;
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>