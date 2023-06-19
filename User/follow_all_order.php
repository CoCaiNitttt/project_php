<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.min.css">
    <title>Tất cả đơn hàng</title>
    <style>
        .frame_follow_all_order{
            margin-top: 150px;
            width: 100%;
        }
        .frame_follow_all_order_body{
            width: 80%;
            margin-left: 10%;
            display: flex;
            justify-content: space-between;
            min-height: 280px;
        }
        .frame_follow_all_order .frame_follow_all_order_body .body_left caption{
            text-align: left;
            margin-bottom: 30px;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
            color: white;
            background: goldenrod;
            height: 50px;
            padding-top: 15px;
            padding-left: 50px;
        }
        .frame_follow_all_order .frame_follow_all_order_body .body_left{
            width: 100%;
            border: 1px solid red;
            border-radius: 20px;
        }
        .frame_follow_all_order .frame_follow_all_order_body .body_left table{
            width: 100%;
            margin-bottom: 20px;
        } 
        .frame_follow_all_order .frame_follow_all_order_body .body_left table th{
            height: 25px;
        }
    </style>
</head>
<body>
    <div class="frame_follow_all_order">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <?php
    $id_account = 0;
    if(isset($_SESSION['arr_user'])) {
        $arr = $_SESSION['arr_user'];
        $id_account = $arr['id'];
    }
    include 'connect.php';
    $sql = "select * from account 
    inner join donhang on account.id = donhang.id_account
    where donhang.id_account = '$id_account' and donhang.TrangThai = 0 or donhang.TrangThai = 1 or donhang.TrangThai = 2";
    $kq = mysqli_query($connect, $sql);
    ?>
        <?php if(isset($_SESSION['arr_user'])) { ?>
            <div class="frame_follow_all_order_body">
            <div class="body_left">
                <table>
                    <caption><h3>THÔNG TIN ĐƠN HÀNG</h3></caption>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Thời gian đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Huỷ đơn hàng</th>
                    </tr>
                    <?php 
                    foreach($kq as $value) {
                    ?>
                    <tr>
                        <th><?php echo $value['id'] ?></th>
                        <th><?php echo $value['NgayTao'] ?></th>
                        <th><?php echo number_format($value['TongTien'], 0, '.', '.')." đ" ?></th>
                        <th>
                            <form action="follow_detail_order.php" method="post">
                                <input hidden  name="TrangThai"  type="text" value="<?php echo $value['TrangThai'] ?>">
                                <input hidden  name="id"  type="text" value="<?php echo $value['id'] ?>">
                                <button type="submit" style="border: none; cursor: pointer;background: white;"><i class="fa-solid fa-eye"></i></button>
                            </form>
                        </th>
                        <th>
                            <form action="delete_order_follow.php" method="post" onsubmit="return check()">
                                <input hidden name="id"  type="text" value="<?php echo $value['id'] ?>">
                                <button type="submit" style="border: none; cursor: pointer;"><i class="fa-sharp fa-solid fa-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            </div>
            <?php } ?>
        <div class="frame_cart_product_footer">
            <?php include 'footer.php' ?>
        </div>
    </div>
    <script>
        function check() {
            if(confirm('Bạn có muốn huỷ đơn hàng này không?') === true) {
                return true;
            }
            return false;
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>