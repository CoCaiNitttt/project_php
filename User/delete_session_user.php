<?php
session_start();
unset($_SESSION['arr_user']);

header("location: account_login.php");
?>