<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Theo dõi đơn hàng</title>
    <style>
        .icon{
            margin-top: 40px;
        }
        .icon i{
            font-size: 120px;
        }
        .body{
            height: 140px;
            width: 80%;
            margin-left: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .body .body_left, .body .body_right{
            width: 560px;
            height: 80px;
            border: 1px solid red;
        }
        .body .body_left{
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }
        .body .body_right{
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            
        }
        .body .title{
            position: absolute;
        }
    </style>
</head>
<body>
    <?php $trangthai = $_POST['TrangThai']; $id = $_POST['id'] ?>
    <div class="header">
        <?php include 'header.php' ?>
    </div>
    <div class="button">
        <button style="height: 30px; font-size: 18px; width: 160px; border-radius: 10px;outline: none; background: red;border: none;margin-top: 120px;; margin-left: 85%;"><a style="text-decoration: none; color: white;" href="order_detail.php?id=<?php echo $id ?>">Chi tiết đơn hàng</a></button>
    </div>
    <?php if($trangthai == 1) { ?>
        <div class="icon">
        <i style="margin-left: 680px;" class="fa-solid fa-motorcycle"></i>
        </div>
        <div class="body">
            <div style="background: red;border-right: none;" class="body_left">
                <div style="margin-top: 120px; color: white; margin-left: -120px; background: red; height: 30px; width: 240px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Chờ xác nhận</h3>
                </div>
            </div>
            <div class="body_right" style="border-left: none;">
                <div style="margin-top: 120px; color: white; margin-left: -120px; background: red; height: 30px; width: 240px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Đang giao hàng</h3>
                </div>
            </div>
            <div>
                <div style="margin-top: 80px; margin-left: -100px; height: 30px; width: 240px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Nhận hàng thành công</h3>
                </div>
            </div>
        </div>
        <button style="height: 30px; font-size: 18px; width: 160px; border-radius: 10px;outline: none; background: red;border: none;margin-bottom: 20px; margin-left: 85%;margin-top: 80px;"><a style="text-decoration: none; color: white;" href="confirm_order.php?id=<?php echo $id ?>">Đã nhận hàng</a></button>
    <?php }
    else if($trangthai == 0) { ?>
    <div class="icon">
        <i style="margin-left: 140px;" class="fa-solid fa-motorcycle"></i>
        </div>
        <div class="body">
            <div style="border-right: none;" class="body_left">
                <div style="margin-top: 120px;color: white; margin-left: -120px; background: red; height: 30px; width: 240px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Chờ xác nhận</h3>
                </div>
            </div>
            <div class="body_right" style="border-left: none;">
                <div style="margin-top: 120px; margin-left: -120px; height: 30px; width: 240px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Đang giao hàng</h3>
                </div>
            </div>
            <div>
                <div style="margin-top: 80px; margin-left: -100px;height: 30px; width: 240px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Nhận hàng thành công</h3>
                </div>
            </div>
        </div>
        <button style="height: 30px; font-size: 18px; width: 160px; border-radius: 10px;outline: none; background: red;border: none;margin-bottom: 20px; margin-left: 85%;margin-top: 80px;"><a style="text-decoration: none; color: white;" href="follow_all_order.php">Trở về</a></button>
    <?php }
    else if($trangthai == 2) {?>
    <div class="icon">
        <i style="margin-left: 1220px;" class="fa-solid fa-motorcycle"></i>
        </div>
        <div class="body">
            <div style="background: red;border-right: none;" class="body_left">
                <div style="margin-top: 120px; color: white; margin-left: -100px; background: red; height: 30px; width: 200px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Chờ xác nhận</h3>
                </div>
            </div>
            <div class="body_right" style="background: red;border-left: none;">
                <div style="margin-top: 120px;color: white; margin-left: -100px; background: red; height: 30px; width: 200px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Đang giao hàng</h3>
                </div>
            </div>
            <div>
                <div style="margin-top: 80px;color: white; margin-left: -100px; background: red; height: 30px; width: 260px; border-radius: 20px; display: flex;justify-content: center;align-items: center;" class="title">
                    <h3>Nhận hàng thành công</h3>
                </div>
            </div>
        </div>

        <button style="height: 30px; font-size: 18px; width: 260px; border-radius: 10px;outline: none; background: red;border: none;margin-bottom: 20px; margin-left: 80%;margin-top: 80px;"><a style="text-decoration: none; color: white;" href="follow_all_order.php">Trở về</a></button>
    <?php } ?>
    <div class="button">
    </div>
    <div class="footer">
        <?php include 'footer.php' ?>
    </div>
</body>
</html>