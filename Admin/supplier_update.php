<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .frame_menu table .nhacungcap{
            background: black;
        }
        /* .frame_menu table .quanlycuahang{
            background: antiquewhite;
        } */
        .frame_news_insert .body{
            display: flex;
            width: 100%;
        }
        .frame_news_insert .body_right{
            width: 90%;
            margin-left: 8%;
        }
        .frame_news_insert .body .body_right_insert{
            background-color: aquamarine;
            width: 90%;
            height: 520px;
            margin-top: 60px;
            border-radius: 10px;
        }
        .frame_news_insert .body .body_right_insert table{
            margin-left: 50px;
            margin-top: 20px;
            height: 500px;
            font-size: 18px;
        }
        .frame_news_insert .body .body_right_insert table input{
            width: 800px;
            height: 30px;
        }
    </style>
</head>
<body>
    <?php
    $id = $_GET['id'];
    include 'connect.php';
    $sql = "select * from nhacungcap where id = '$id'";
    $ket_qua = mysqli_query($connect, $sql);
    $kq = mysqli_fetch_array($ket_qua);
    ?>
    <div class="frame_news_insert">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_left">
                <?php include 'menu.php' ?>
            </div>
            <div class="body_right">
                <div class="body_right_titile">
                    <h1>Cập nhật nhà cung cấp</h1>
                </div>
                <div class="body_right_insert">
                    <form action="supplier_update_mysql.php" method="post" onsubmit="return check()">
                    <table>
                        <tr><td><input type="text" value="<?php echo $kq['id'] ?>" hidden name="id"></td></tr>
                        <tr><td>Tên nhà cung cấp</td></tr>
                        <tr><td><input value="<?php echo $kq['TenNhaCungCap'] ?>" style="border: none;outline: none; border-radius: 10px;" type="text" name="ten"></td></tr>
                        <tr><td>Địa chỉ</td></tr>
                        <tr><td><input  value="<?php echo $kq['DiaChi'] ?>"  style="border: none;outline: none; border-radius: 10px;"  type="text" name="diachi"></td></tr>
                        <tr><td>Số điện thoại</td></tr>
                        <tr><td><input id="phone"  value="<?php echo $kq['SoDienThoai'] ?>"  style="border: none;outline: none; border-radius: 10px;"  type="text" name="sodienthoai"></td></tr>
                        <tr><td><button style="border-radius: 6px; outline: none; border: none;margin-left: 800px;" ><input style="width: 120px; height: 30px; border: none; outline: none;border-radius: 6px; cursor: pointer;" type="submit" value="Lưu"></button></td></tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check() {
            var phone = document.getElementById('phone').value;
            const regex_phone = /(0[3|5|7|8|9])+([0-9]{8})\b/g;

           
            if(!regex_phone.test(phone)) {
                alert("Nhập lại số điện thoại");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>