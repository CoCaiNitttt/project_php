<?php session_start(); 
$arr = [];
if(isset($_SESSION['arr_admin'])) {
    $arr = $_SESSION['arr_admin'];
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin Admin</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            margin-top: 50px;
            background-image: url(https://img.freepik.com/free-vector/background-realistic-abstract-technology-particle_23-2148431735.jpg?w=996&t=st=1685874134~exp=1685874734~hmac=84c72facc2ed57e3ae7a051f6166c8158084b97b41165cb2124127d702b002d2);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .form_login_admin{
            height: 600px;
            width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid white;
            background: rgba(2, 2, 2, 0.1);
            border-radius: 15px;
            color: white;
        }
        .form_login_admin form{
            height: 550px;
            width: 440px;
        }
        .form_login_admin form table {
            height: 90%;
            width: 100%;
            text-align: left;
        }
        .form_login_admin form table caption{
            margin-bottom: 20px;
        }
        .form_login_admin form table input, .form_login_admin form table select{
            width: 90%;
            height: 25px;
            border: none;
            outline: none;
            border-radius: 10px;
            padding-left: 5px;
        }
    </style>
</head>
<body>

        <div class="form_login_admin">
            <form action="update_info_admin_mysql.php" method="post">
            <table>
                <caption><h2>CẬP NHẬT THÔNG TIN</h2></caption>
                <tr>
                    <th>Họ tên: </th>
                    <th><input value="<?php echo $arr['HoTen'] ?>" type="text" id="" name="hoten"></th>
                </tr>
                <tr>
                    <th>Địa chỉ: </th>
                    <th><input value="<?php echo $arr['DiaChi'] ?>" type="text" id="" name="diachi"></th>
                </tr>
                <tr>
                    <th>Số điện thoại: </th>
                    <th><input value="<?php echo $arr['SoDienThoai'] ?>" type="text" id="" name="sodienthoai"></th>
                </tr>
                <tr>
                    <th>Email: </th>
                    <th><input value="<?php echo $arr['Email'] ?>" type="text" id="" name="email"></th>
                </tr>
                <tr>
                    <th>Giới tính: </th>
                    <th><select name="gioitinh" id="">
                        <option value="2">Nam</option>
                        <option value="1">Nữ</option>
                    </select></th>
                </tr>
                <tr>
                    <th>Hình ảnh: </th>
                    <th><input type="file" id="" name="hinhanh"></th>
                </tr>
                <tr>
                    <th colspan="2"><button style="height: 28px; width: 93%; border: none;background-color: deepskyblue; color: white; border-radius: 10px; cursor: pointer;" type="submit">Cập nhật</button></th>
                </tr>
            </table>
            </form>
        </div>
</body>
</html>