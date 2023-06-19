<?php
session_start();
unset($_SESSION['arr_admin']);
header("location: login.php");
?>