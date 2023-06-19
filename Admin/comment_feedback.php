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
        .frame_menu table .comment{
            background: black;
        }
        /* .frame_menu table .quanlycuahang{
            background: antiquewhite;
        } */
        .frame_feedback .body{
            display: flex;
            width: 100%;
        }
        .frame_feedback .body_right{
            width: 96%;
            margin-left: 2%;
        }
        .frame_feedback .body_right .body_right_comment{
            width: 90%;
            height: 200px;
            background-color: aquamarine;
            border-radius: 10px;
            margin-left: 5%;
        }
        .frame_feedback .body .body_right_comment table{
            margin-left: 50px;
            margin-top: 20px;
            height: 200px;
            font-size: 18px;
            width: 90%;
            margin-left: 5%;
        }
        .frame_feedback .body .body_right_comment table tr .title{
            width: 160px;
        }
        .frame_feedback .body .body_right_comment table td{
            margin-left: 20px;
        }
        .frame_feedback .body_right .feedback{
            width: 90%;
            height: 250px;
            background-color: aquamarine;
            border-radius: 10px;
            margin-left: 5%;
            margin-top: 40px;
        }
        .frame_feedback .body_right .feedback table{
            width: 90%;
            margin-left: 5%;
        }
        .frame_feedback .body_right .feedback table textarea{
            width: 90%;
            height: 120px;
            border-radius: 15px;
            margin-top: 30px;
            padding: 4px;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';

    $id = $_GET['id'];
    // $sql_loai_sp = "select * from loaisanpham";
    // $ket_qua_lsp = mysqli_query($connect, $sql_loai_sp);

    // $sql_nha_cung_cap = "select * from nhacungcap";
    // $ket_qua_ncc = mysqli_query($connect, $sql_nha_cung_cap);

    $sql_san_pham = "select * from sanpham where id = '$id'";
    $ket_qua_san_pham = mysqli_query($connect, $sql_san_pham);
    $kq_san_pham = mysqli_fetch_array($ket_qua_san_pham);
    
    ?>
    <div class="frame_feedback">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_left">
                <?php include 'menu.php' ?>
            </div>
            <div class="body_right">
                <div class="body_right_titile">
                    <h1>Phản hồi bình luận</h1>
                </div>
                <div class="body_right_comment">
                    <table>
                        <tr></tr>
                        <tr>
                            <td class="title">Tên sản phẩm: </td>
                            <td><?php echo $kq_san_pham['TenSP'] ?></td>
                            <td class="title">Số lượng: </td>
                            <td><?php echo $kq_san_pham['SoLuong'] ?></td>
                        </tr>
                        <tr>
                            <td class="title">Giá: </td>
                            <td><?php echo number_format($kq_san_pham['Gia'], 0, '.', '.')."đ"  ?></td>
                            <td class="title">Giá giảm: </td>
                            <td><?php echo number_format($kq_san_pham['GiaGiam'], 0, '.', '.')."đ"  ?></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="feedback">
                    <form action="comment_feedback_mysql.php" method="post" onsubmit="return check()">
                        <table>
                            <tr><input hidden  type="text" value="<?php echo $_GET['id_c'] ?>" name="id_comment"></tr>
                        <tr>
                            <th><textarea name="content" id="noidung" cols="60" rows="20"></textarea></th>
                        </tr>
                        <tr>
                            <th><button type="submit" style="height: 30px; font-size: 18px; width: 160px; border-radius: 10px;outline: none; background: green; color: white; cursor: pointer; border: none;margin-bottom: 20px; margin-left: 73%;margin-top: 20px;">Phản hồi</button></th>
                        </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check() {
            var content = document.getElementById('noidung').value;
            if(content == "") {
                alert('Nhập nội dụng bạn muốn phản hồi');
                return false;
            }
            return true;
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>