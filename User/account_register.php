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
            margin-top: 50px;
            background-image: url(https://img.freepik.com/free-vector/background-realistic-abstract-technology-particle_23-2148431735.jpg?w=996&t=st=1685874134~exp=1685874734~hmac=84c72facc2ed57e3ae7a051f6166c8158084b97b41165cb2124127d702b002d2);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .form_register_user{
            height: 540px;
            width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid white;
            background: rgba(2, 2, 2, 0.1);
            border-radius: 15px;
            color: white;
        }
        .form_register_user form{
            height: 480px;
            width: 440px;
        }
        .form_register_user form table {
            height: 90%;
            width: 100%;
        }
        .form_register_user form table caption{
            margin-bottom: 20px;
        }
        .form_register_user form table input{
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
        <div class="form_register_user">
            <form action="account_register_mysql.php" method="post" onsubmit="return check_register()">
            <table>
                <caption><h2>ĐĂNG KÝ</h2></caption>
                <tr>
                    <th>Tài khoản: </th>
                    <th><input type="text" id="accounts" name="account"></th>
                </tr>
                <tr>
                    <th>Mật khẩu: </th>
                    <th><input type="password" id="passwords" name="password"></th>
                </tr>
                <tr>
                    <th>Họ và tên: </th>
                    <th><input type="text" id="names" name="name"></th>
                </tr>
                <tr>
                    <th>Email: </th>
                    <th><input type="text" id="emails" name="email"></th>
                </tr>
                <tr>
                    <th>Số điện thoại: </th>
                    <th><input type="text" id="phones" name="phone"></th>
                </tr>
                <tr>
                    <th colspan="2"><button style="height: 28px; width: 86%; border: none;background-color: deepskyblue; color: white; border-radius: 10px; cursor: pointer;" type="submit">Đăng ký</button></th>
                </tr>
                <tr>
                <th colspan="2"><p>Bạn đã có tài khoản? <a style="color: white; margin-left: 20px;text-decoration: none;" href="account_login.php">Đăng nhập</a></p></th>
                </tr>
            </table>
            </form>
        </div>
    <script>
        function check_register() {
            var name = document.getElementById('names').value;
            var email = document.getElementById('emails').value;
            var phone = document.getElementById('phones').value;
            var account = document.getElementById('accounts').value;
            var password = document.getElementById('passwords').value;


            const regex_full_name = /^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
            const regex_email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            const regex_account = /^[a-zA-Z0-9_-]{3,16}$/;
            const regex_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            const regex_phone = /(0[3|5|7|8|9])+([0-9]{8})\b/g;

            if(account == "") {
                alert("Nhập thông tin tài khoản");
                return false;
            }
            else if(!regex_account.test(account)) {
                alert("Tài khoản chỉ có thể chứa các ký tự: 0-9, a-z, A-Z, _, - và từ 6 đến 18 kí tự");
                return false;
            }
            if(password == "") {
                alert("Nhập thông tin mật khẩu");
                return false;
            }
            else if(!regex_password.test(password)) {
                alert("Mật khẩu ít nhất 8 ký tự, một chữ hoa, một chữ thường, một số và một ký tự đặc biệt");
                return false;
            }
            if(name == "") {
                alert("Nhập họ và tên");
                return false;
            }
            else if(!regex_full_name.test(name)) {
                alert("Điền đầy đủ họ tên và viết hoa chữ cái đầu");
                return false;
            }
            if(email == "") {
                alert("Nhập địa chỉ email");
                return false;
            }
            else if(!regex_email.test(email)) {
                alert("Nhập sai định dạng email");
                return false;
            }
            if(phone == "") {
                alert('Nhập số điện thoại');
                return false;
            }
            else if(!regex_phone.test(phone)) {
                alert("Nhâp số điện thoại có 10 chữ số và có số 0 đứng đầu");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>