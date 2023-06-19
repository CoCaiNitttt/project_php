<?php
session_start();
include 'connect.php';
$account = $_POST['account'];
$sql = "select * from account
        where TaiKhoan = '$account' and role = 0";
$ket_qua = mysqli_query($connect, $sql);
$kq = mysqli_fetch_array($ket_qua);

if(isset($kq)) { ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận Email</title>
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
            height: 240px;
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
            height: 200px;
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
            <form action="../email/index.php" method="post" onsubmit="return check()">
            <table>
                <caption><h2>LẤY LẠI MẬT KHẨU</h2></caption>
                <tr>
                    <th>Email: </th>
                    <th><input type="email" readonly value="<?php echo $kq['Email'] ?>" name="email"></th>
                </tr>
                <tr>
                    <th colspan="2"><button style="height: 28px; width: 86%; border: none;background-color: deepskyblue; color: white; border-radius: 10px; cursor: pointer;" type="submit" name="send">Xác nhận</button></th>
                </tr>
            </table>
            </form>
        </div>
</body>
</html>
<?php }
else {
    $_SESSION['confirm_account'] = 1;
    header("location: account_forgot_password.php");
}
mysqli_close($connect);
?>
