<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Bình luận</title>
    <style>
        .frame_menu table .comment{
            background: black;
        }
        /* .frame_menu table .quanlycuahang{
            background: antiquewhite;
        } */
        .frame_news .body{
            display: flex;
            background-color: #cccc;
            margin-bottom: 20px;
        }
        .frame_news .body .body_right{
            width: 80%;
            background: white;
        }
        .frame_news .body .body_right table{
            width: 90%;
            margin-top: 10px;
            margin-left: 5%;
        }
        .frame_news .body .body_right table th{
            height: 30px;
        }
        .frame_news .body .body_right .body_right_top{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .frame_news .body .body_right .body_right_top .title{
            margin: 20px 40px;
        }
        .frame_news .body .body_right .body_right_top .function{
            display: flex;
            width: 140px;
            justify-content: space-between;
        }
        img{
            height: 100px;
            width: 80px;
        }
    </style>
</head>
<body>
    <div class="frame_news">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_left">
                <?php include 'menu.php' ?>
            </div>
            <div class="body_right">
            <div class="body_right_top">
                <div class="title">
                    <h2>Quản lý bình luận</h2>
                </div>
            </div>
            <div class="body_right_bottom">
                <table border="1" style="border-collapse: collapse;">
                    <tr>
                        <th>STT</th>
                        <th>Khách hàng</th>
                        <th>Nội dụng</th>
                        <th>Ngày tạo</th>
                        <th>Phản hồi</th>
                        <th>Xoá</th>
                    </tr>
                    <?php
                        include 'connect.php';
                        $tranghientai = 1;
                        if(isset($_GET['trang'])) {
                            $tranghientai = $_GET['trang'];
                        }
                        $socode1Trang = 18;
                        $offset = ($tranghientai - 1) * $socode1Trang;

                        $sql_tong_so_code = "select count(*) from comment";
                        $mang_so_code = mysqli_query($connect, $sql_tong_so_code);
                        $ket_qua_code = mysqli_fetch_array($mang_so_code);
                        $tong_so_code = $ket_qua_code['count(*)'];

                        $sotrang = ceil($tong_so_code / $socode1Trang);

                        $sql_code = "select * from comment 
                        inner join account on comment.id_account = account.id
                        inner join sanpham on comment.id_product = sanpham.id
                        where comment.TrangThai = 0
                        limit $socode1Trang offset $offset";
                        $ket_qua = mysqli_query($connect, $sql_code);
                        $stt = 0;
                        foreach($ket_qua as $value) { $stt++; ?>
                        <tr>
                            <th><?php echo $stt ?></th>
                            <th><?php echo $value['HoTen'] ?></th>
                            <th><?php echo $value['content'] ?></th>
                            <th><?php echo $value['date'] ?></th>
                            <th><a style="color: black;" href="comment_feedback.php?id=<?php echo $value['id_product'] ?>&&id_c=<?php echo $value['id_c'] ?>"><i class="fa-solid fa-comment"></i></a></th>
                            <th>
                                <form action="comment_delete.php" method="post" onsubmit="return check()">
                                <input name="id" type="text" value="<?php echo $value['id_c'] ?>" hidden  style="width: 20px;">
                                <button style="border: none;cursor: pointer;" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <div style="width: 100%; display: flex; justify-content: center; align-items: center;" class="button">
                <?php
            for($i = 1; $i <= $sotrang; $i++) { ?>
            <button style="height: 20px; width: 30px; margin-top: 10px; margin-right: 10px;">
                <a style="text-decoration: none;color: black;" href="news.php?trang=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </button>
            <?php }
            ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check() {
            if(confirm('Bạn có muốn xoá bình luận này không?') === true) {
                return true;
            }
            return false;
        }
    </script>
</body>
</html>