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
        .frame_menu table .magiamgia{
            background: black;
        }
        /* .frame_menu table .quanlybanhang{
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
                    <h1>Thêm mã giảm giá</h1>
                </div>
                <div class="body_right_insert">
                    <form action="discount_code_insert_mysql.php" method="post" onsubmit="return check()">
                    <table>
                        <tr></tr>
                        <tr><td>Mã giảm giá</td></tr>
                        <tr><td><input id="code" style="border: none;outline: none; border-radius: 10px;" type="text" name="magiamgia"></td></tr>
                        <tr><td>Số lần nhập</td></tr>
                        <tr><td><input id="sl" style="border: none;outline: none; border-radius: 10px;"  type="text" name="solannhap"></td></tr>
                        <tr><td>Số tiền giảm</td></tr>
                        <tr><td><input id="tiengiam" style="border: none;outline: none; border-radius: 10px;"  type="text" name="sotiengiam"></td></tr>
                        <tr><td>Đơn hàng tối thiểu</td></tr>
                        <tr><td><input id="toithieu" style="border: none;outline: none; border-radius: 10px;"  type="text" name="donhangtoithieu"></td></tr>
                        <tr><td>Ngày hết hạn</td></tr>
                        <tr><td><input id="hethan" style="border: none;outline: none; border-radius: 10px;"  type="date"  name="ngayhethan"></td></tr>
                        <tr><td><button style="border-radius: 6px; outline: none; border: none;margin-left: 800px;" ><input style="width: 120px; height: 30px; border: none; outline: none;border-radius: 6px; cursor: pointer;" type="submit" value="Thêm"></button></td></tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check() {
            var code = document.getElementById('code').value;
            var solannhap = document.getElementById('sl').value;
            var sotiengiam = document.getElementById('tiengiam').value;
            var dontoithieu = document.getElementById('toithieu').value;
            var ngayhethan = document.getElementById('hethan').value;
            
            var regex_number = /^[1-9]\d*$/;
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

            let date1 = new Date(ngayhethan);
            let date2 = new Date(date);

            if(code == "") {
                alert("Nhập mã giảm giá");
                return false;
            }
            if(solannhap == "") {
                alert("Nhập số lần nhập");
                return false;
            }
            else if(!regex_number.test(solannhap)) {
                alert("Nhập số lần nhập là 1 số > 0");
                return false;
            }
            if(sotiengiam == "") {
                alert("Nhập số tiền giảm");
                return false;
            }
            else if(!regex_number.test(sotiengiam)) {
                alert("Nhập số tiền giảm là 1 số > 0");
                return false;
            }
            if(dontoithieu == "") {
                alert("Nhập đơn giá tối thiểu");
                return false;
            }
            else if(!regex_number.test(dontoithieu)) {
                alert("Nhập đơn tối thiểu là 1 số > 0");
                return false;
            }
            if(Number(dontoithieu) < Number(sotiengiam)) {
                alert("Nhập đơn tối thiểu >= số tiền giảm");
                return false;
            }
            if(ngayhethan == "") {
                alert("Nhập ngày hết hạn mã giảm giá");
                return false;
            }
            else if(date1 <= date2) {
                alert("Nhập lại ngày hết hạn mã giảm giá");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>