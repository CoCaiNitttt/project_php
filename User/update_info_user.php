<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin</title>
    <style>
        .frame_update{
            width: 90%;
            margin-left: 5%;
            border: 1px solid red;
            border-radius: 50px;
            height: 460px;
            
        }
        .body_left, .body_right{
            width: 50%;
        }
        .body_left table, .body_right table{
            width: 98%;
            height: 80%;
            margin-top: 20px;
            text-align: left;
            margin-left: 40px;
        }
        .body_left table input{
            width: 500px;
            height: 26px;
            border-radius: 20px;
            padding-left: 10px;
        }
        .frame_update .body_left table i{
            color: red;
        }
        .body_right table input{
            width: 500px;
            height: 26px;
            border-radius: 20px;
            padding-left: 10px;
        }
        .frame_update .body_right form{
            height: 85%;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <?php
    $arr = [];
    if(isset($_SESSION['arr_user'])) {
        $arr = $_SESSION['arr_user'];
    }
    ?>
    <div class="frame_update" style="margin-top: 140px;display: flex;">
        <div class="body_left">
            <table>
                <caption><h2>Thông tin cá nhân</h2></caption>
                <tr><th>Họ và tên:</th></tr>
                <tr><th><input value="<?php echo $arr['name'] ?>" readonly type="text"></th></tr>
                <tr><th>Số điện thoại:</th></tr>
                <tr><th><input value="<?php echo $arr['phone'] ?>" readonly type="text"></th></tr>
                <tr><th>Email:</th></tr>
                <tr><th><input value="<?php echo $arr['email'] ?>" readonly type="text"></th></tr>
                <tr><th>Địa chỉ: </th></tr>
                <tr><th><input  value="<?php if($arr['address'] != null) {
                    echo $arr['address'];
                } 
                else {
                    echo "Chưa cập nhật thông tin";
                } ?>" readonly type="text"></th></tr>
                <tr><th>Giới tính:</th></tr>
                <tr><th><input value="<?php 
                if($arr['sex'] == 0) {
                    echo "Chưa cập nhật thông tin";
                }
                else if($arr['sex'] == 1) {
                    echo "Nữ";
                }
                else {
                    echo "Nam";
                }
                ?>" readonly type="text"></th></tr>
                <tr>
                <th><button style="height: 28px; width: 120px; border: none;background-color: deepskyblue; color: white; border-radius: 10px; cursor: pointer;margin-left: 380px;"><a style="color: white;text-decoration: none;" href="TrangChu.php">Thoát</a></button></th>
                </tr>
            </table>
        </div>
        <div class="x" style="border: 1px solid gray;height: 400px;margin-top: 30px;"></div>
        <div class="body_right">
        <form action="update_info_user_mysql.php" method="post" onsubmit="return check()">
            <table>
                <caption  style="margin-right: 100px;"><h2>Cập nhật thông tin</h2></caption>
                <tr>
                    <th>Họ và tên: </th>
                </tr>
                <tr>
                    <th><input type="text" id="ten" name="name"></th>
                </tr>
                <tr>
                    <th>Địa chỉ: </th>
                </tr>
                <tr>
                    <th><input type="text" id="diachi" name="address"></th>
                </tr>
                <tr>
                    <th>Giới tính: </th>
                </tr>
                <tr>
                    <th><select style="width: 500px;height: 26px; border-radius: 10px;padding-left: 10px;" name="sex" id="">
                        <option value="2">Nam</option>
                        <option value="1">Nữ</option>
                    </select></th>
                </tr>
                
                <tr>
                    <th><button style="height: 28px; width: 120px; border: none;background-color: deepskyblue; color: white; border-radius: 10px; cursor: pointer;margin-left: 380px;" type="submit">Cập nhật</button></th>
                </tr>
                <tr>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <script>
        function check() {
            var name = document.getElementById('ten').value;
        var address = document.getElementById('diachi').value;
        
        const regex_full_name = /^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
       
        if(name == "") {
            alert("Nhập họ và tên");
            return false;
        }
        else if(!regex_full_name.test(name)) {
            alert("Điền đầy đủ họ tên và viết hoa chữ cái đầu");
            return false;
        }
        if(address == "") {
            alert("Nhập thông tin địa chỉ");
            return false;
        }

        return true;
        }
    </script>
</body>
</html>