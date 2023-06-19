<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận Tài Khoản</title>
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
            <form action="account_confirm_email.php" method="post" onsubmit="return check()">
            <table>
                <caption><h2>Xác nhận tài khoản</h2></caption>
                <tr>
                    <th>Tài khoản: </th>
                    <th><input type="text" id="taikhoan" name="account"></th>
                </tr>
                <tr>
                    <th colspan="2"><button style="height: 28px; width: 86%; border: none;background-color: deepskyblue; color: white; border-radius: 10px; cursor: pointer;" type="submit" name="send">Xác nhận</button></th>
                </tr>
            </table>
            </form>
        </div>
    <script>
        if("<?php echo $_SESSION['confirm_account'] ?>" == 1) {
            alert('Thông tin tài khoản không chính xác');
        }
        function check() {
            let account = document.getElementById('taikhoan').value;
            

            if(account == "") {
                alert("Nhập thông tin tài khoản");
                return false;
            }
            return true;
            
        }
    </script>
    <?php $_SESSION['confirm_account'] = 0; ?>
</body>
</html>