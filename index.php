<?php
include('core/config.php');
include('assets/views/head.php');  
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
        // echo "Login gagal! username dan password salah!";
    }else if($_GET['pesan'] == "logout"){
        // echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
        // echo "Anda harus login untuk mengakses halaman admin";
    }
}
?>
<body>

    
<?php
include('login.php');
include('register.php');
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">BELAJAR DARI SENTIMEN!</h1>
    <p class="lead">Mari cari tau apakah komentar di twitter <br>mengandung kalimat positif atau bahkan negative ?<br> anda bisa mencari tau di website ini untuk mengetahui sentimen komentar di twitter.</p>
    <button class="btn btn-primary" onclick="document.getElementById('login').style.display='block'"style="width:auto;
    border-radius:12px; margin-botom:20px;">Coba Sekarang</button>
    
  </div>
</div>  

            </div>
    </div>
</div>

</body>

<?php
include('assets/views/foot.php');   
?>

</html>