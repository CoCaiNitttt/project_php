<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .frame_new{
            height: 100vh;
        }
        .body{
            margin-top: 140px;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .body .all_new{
            width: 80%;
            height: 100%;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="frame_new">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="all_new">

            </div>
        </div>
        <div class="footer">
            <?php include 'footer.php' ?>
        </div>
    </div>
</body>
</html>