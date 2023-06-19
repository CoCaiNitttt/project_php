<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.min.css">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .frame_header{
            height: 80px;
            background: black;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .frame_header .header_left{
            width: 300px;
            height: 100%;
        }
        .frame_header .header_left h2{
            margin: 24px 0 0 50px;
        }
        .frame_header .header_right{
            display: flex;
            justify-content: space-around;
            margin-right: 40px;
            width: 260px;
        }
        .frame_header .header_right .icon_admin i{
            margin-top: 4px;
        }
        .frame_header .header_right .setting{
            margin-top: 4px;
            margin-left: 60px;
        }
        .frame_header .header_right .setting i:hover .setting_child{
            display: block;
        }
        .setting_child{
            position: absolute;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            margin-left: -150px;
            background: red;
            display: none;
        }
        .setting_child .info, .setting_child .out{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="frame_header">
        <div class="header_left">
            <h2>Quản trị hệ thống</h2>
        </div>
        <div class="header_right">
            <div class="icon_admin">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="title">
                <h3><?php $arr = $_SESSION['arr_admin']; echo $arr['HoTen'] ?></h3>
            </div>
            <div class="setting">
                <i class="fa-solid fa-gear">
                    <div style="width: 208.5px; text-align: left;" class="setting_child">
                        <table style="width: 90%; height: 60px;">
                            <tr class="info"><th><a href="update_info_admin.php">Cập nhật thông tin</a></th></tr>
                            <tr><th><div style="width: 100%; border: 1px solid black; margin-left: 5%;"></div></th></tr>
                            <tr class="out"><th><a href="delete_session_admin.php">Đăng xuất</a></th></tr>
                        </table>
                    </div>
                </i>
            </div>
        </div>
    </div>
</body>
</html>