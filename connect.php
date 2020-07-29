<!-- # algoritma-stemming-nazief-adriani

 -->
<?php
$host='localhost';
$user='root';
$pass='';
$database='db_textmining';
$koneksi = mysqli_connect($host, $user, $pass,$database);
 
    if (mysqli_connect_error()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
    ?>