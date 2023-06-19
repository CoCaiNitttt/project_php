<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
include 'connect.php';
$sql = "select * from magiamgia";
$ket_qua = mysqli_query($connect, $sql);

foreach($ket_qua as $value) {
    $id = $value['id'];
    $NgayHethan = $value['NgayHetHan'];
    if(strtotime($NgayHethan) <= strtotime($date)) {
        $sql_update = "update magiamgia set TrangThai = 0 where id = '$id'";
        mysqli_query($connect, $sql_update);
    }
}
mysqli_close($connect);
?>
<?php session_start();
// if(isset($_SESSION['arr_user'])) {
//     header("location: TrangChu.php"); 
// } 
// else { ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            margin-top: 150px;
            background-image: url(https://img.freepik.com/free-vector/background-realistic-abstract-technology-particle_23-2148431735.jpg?w=996&t=st=1685874134~exp=1685874734~hmac=84c72facc2ed57e3ae7a051f6166c8158084b97b41165cb2124127d702b002d2);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .form_login_user{
            height: 340px;
            width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid white;
            background: rgba(2, 2, 2, 0.1);
            border-radius: 15px;
            color: white;
        }
        .form_login_user form{
            height: 280px;
            width: 440px;
        }
        .form_login_user form table {
            height: 90%;
            width: 100%;
        }
        .form_login_user form table caption{
            margin-bottom: 20px;
        }
        .form_login_user form table input{
            width: 80%;
            height: 25px;
            border: none;
            outline: none;
            border-radius: 10px;
            padding-left: 5px;
        }
    </style>
</head>
<body>
        <div class="form_login_user">
            <form action="check_account_user.php" method="post" onsubmit="return check()">
            <table>
                <caption><h2>ĐĂNG NHẬP</h2></caption>
                <tr>
                    <th>Tài khoản: </th>
                    <th><input type="text" id="account" name="account"></th>
                </tr>
                <tr>
                    <th>Mật khẩu: </th>
                    <th><input type="password" id="password" name="password"></th>
                </tr>
                <tr style="height: 10px;">
                    <th></th>
                    <th><i><a style="text-decoration: none; margin-left: 165px;color: white;" href="account_forgot_password.php">Quên mật khẩu</a></i></th>
                </tr>
                <tr>
                    <th colspan="2"><button style="height: 28px; width: 86%; border: none;background-color: deepskyblue; color: white; border-radius: 10px; cursor: pointer;" type="submit">Đăng nhập</button></th>
                </tr>
                <tr>
                <th colspan="2"><p>Bạn đã có tài khoản? <a style="color: white;text-decoration: none;margin-left: 20px;" href="account_register.php">Đăng ký</a></p></th>
                </tr>
            </table>
            </form>
        </div>
    <script>
        function check() {
            let account = document.getElementById('account').value;
            let password = document.getElementById('password').value;

            if(account == "") {
                alert("Nhập thông tin tài khoản");
                return false;
            }
            else if(password == "") {
                alert("Nhập thông tin mật khẩu");
                return false;
            }
            return true;
        }
        if(<?php echo $_SESSION['check_account_user'] ?> === 1) {
                alert("Thông tin tài khoản không chính xác");
            }
        if(<?php echo $_SESSION['check_account_user'] ?> === 2) {
                alert("Thông tin mật khẩu không chính xác");
            }
    </script>
    <?php $_SESSION['check_account_user'] = 0; ?>
</body>
</html>
<?php // } ?>