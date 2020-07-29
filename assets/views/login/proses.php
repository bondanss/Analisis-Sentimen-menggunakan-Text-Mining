<?php
session_start();
include 'config.php';
$stopword = mysqli_real_escape_string($koneksi,$_GET['stopword']);



/// menginput data ke database
mysqli_query($koneksi,"insert into tb_stopword values('','$stopword')");
	 
// mengalihkan halaman kembali ke index.php
header("location:../../../home.php");
?>