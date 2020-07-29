<?php
session_start();
include 'config.php';
$username = mysqli_real_escape_string($koneksi,$_GET['user']);
$password = mysqli_real_escape_string($koneksi, $_GET['password']);
$password = md5($password);

/// menginput data ke database
mysqli_query($koneksi,"insert into tb_login values('$username','$password')");
	 
// mengalihkan halaman kembali ke index.php
header("location:../../../index.php");
?>