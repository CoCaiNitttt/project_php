<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../User/connect.php';
$email = $_POST['email'];
$sql = "select * from user
        inner join account on user.id_account = account.id
        where Email = '$email'";
$ket_qua = mysqli_query($connect, $sql);
$kq = mysqli_fetch_array($ket_qua);

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'nguyenvantruc539@gmail.com';                 // SMTP username
    $mail->Password = 'inrysympemhkhwjr';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;    

    $mail->setFrom('nguyenvantruc539@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Your Password";
    $mail->Body = 'Mật khẩu của bạn là: ' . $kq['MatKhau'];


    $mail->send();
    
header("location: ../User/account_login.php");
}


?>