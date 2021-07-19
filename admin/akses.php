<?php

$server = "127.0.0.1";
$user = "root";
$pass = "";
$database = "login_register_pure_coding";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}


session_start();

if(!isset($_SESSION['admin'])){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="../index.php";</script>';
}
?>