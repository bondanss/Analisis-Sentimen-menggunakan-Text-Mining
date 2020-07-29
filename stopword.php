<?php


session_start();
if($_SESSION['user']==null)
{
    header("location:index.php");
}



// if($_SESSION['status']!="login"){
//     header("location:../index.php?pesan=belum_login");
// }
include('assets/views/headlog.php');
?>
<?php
include('assets/views/inputdata.php');   
?>