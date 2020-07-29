<?php
session_start();
include 'config.php';
$username = mysqli_real_escape_string($koneksi,$_GET['user']);
$password = mysqli_real_escape_string($koneksi, $_GET['password']);
$password = md5($password);
$data = mysqli_query($koneksi,"select * from tb_login where user='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0){
	$row = mysqli_fetch_array($data);
    $_SESSION['user'] = $row['user'];
	// $_SESSION['user'] = $username;
	// $_SESSION['status'] = "login";
	header("location:../../../home.php");
}else{
	header("location:../../../index.php");
}
?>