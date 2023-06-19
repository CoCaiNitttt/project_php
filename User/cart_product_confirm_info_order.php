<?php session_start(); $arr = $_SESSION['arr_user'] ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thông tin</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            background: #cccc;
        }
        .body_confirm_info{
            margin-top: 150px;
            height: 480px;
            width: 500px;
        }
        .body_confirm_info table{
            height: 420px;;
            width: 95%;
            text-align: left;
        }
        .body_confirm_info table input{
            height: 22px;
            width: 270px;
            border-radius: 6px;
            outline: none;
            border: none;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';
    $sql_province = "select * from province";
    $ket_qua_province = mysqli_query($connect, $sql_province);
    

    ?>
    <div class="frame_confirm_info">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body_order">
            <div class="body_confirm_info">
                <form action="cart_product_order.php" method="post">
                <table>
                    <caption style="margin-bottom: 40px;"><h2>Xác nhận thông tin giao hàng</h2></caption>
                    <tr>
                        <th>Khách hàng: </th>
                        <th><input type="text" value="<?php echo $arr['name'] ?>" name="name"></th>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <th><input type="text" value="<?php echo $arr['email'] ?>" name="email"></th>
                    </tr>
                    <tr>
                        <th>Số điện thoại: </th>
                        <th><input type="text" value="<?php echo $arr['phone'] ?>" name="phone"></th>
                    </tr>
                    
                    <tr>
                        <th>Địa chỉ nhận hàng: </th>
                        <th>
                            <textarea style="width: 270px;border-radius: 10px;outline: none;border: none;padding-left: 4px;padding-top: 4px;" name="address" id="" cols="30" rows="5"><?php echo $arr['address'] ?></textarea>
                        </th>
                    </tr>
                    <tr>
                        <th>Mã giảm giá(nếu có): </th>
                        <th><input type="text" name="discount_code"></th>
                    </tr>
                    <tr>
                        <th colspan="2"><button style="height: 24px; width: 95%; border-radius: 8px; border: none; outline: none;cursor: pointer;background: cadetblue; color: white; margin-top: 10px;">Xác nhận</button></th>
                    </tr>
                </table>
                </form>
            </div>
        </div>
        <div class="footer">
        <?php //include 'footer.php' ?>
        </div>
    </div>
</body>
</html>