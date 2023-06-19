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
                    <h1>Thêm nhà cung cấp</h1>
                </div>
                <div class="body_right_insert">
                    <form action="supplier_insert_mysql.php" method="post" onsubmit="return check()">
                    <table>
                        <tr></tr>
                        <tr><td>Tên nhà cung cấp</td></tr>
                        <tr><td><input style="border: none;outline: none; border-radius: 10px;" type="text" name="ten" id="name"></td></tr>
                        <tr><td>Địa chỉ</td></tr>
                        <tr><td><input style="border: none;outline: none; border-radius: 10px;"  type="text" name="diachi" id="address"></td></tr>
                        <tr><td>Số điện thoại</td></tr>
                        <tr><td><input style="border: none;outline: none; border-radius: 10px;"  type="text" name="sodienthoai" id="phone"></td></tr>
                        <tr><td><button style="border-radius: 6px; outline: none; border: none;margin-left: 800px;" ><input style="width: 120px; height: 30px; border: none; outline: none;border-radius: 6px; cursor: pointer;" type="submit" value="Thêm"></button></td></tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var phone = document.getElementById('phone').value;

            const regex_phone = /(0[3|5|7|8|9])+([0-9]{8})\b/g;

            if(name == "") {
                alert("Nhập tên nhà cung cấp");
                return false;
            }
            if(address == "") {
                alert("Nhập địa chỉ nhà cung cấp");
                return false;
            }
            if(phone == "") {
                alert("Nhập số điện thoại nhà cung cấp");
                return false;
            }
            else if(!regex_phone.test(phone)) {
                alert("Nhập lại số điện thoại");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>