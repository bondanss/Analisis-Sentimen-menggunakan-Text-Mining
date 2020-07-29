<?php
session_start();

$keyword = $_POST['keyword'];
if($keyword==null){
	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('SIlakan Input Keyword');
    window.location.href='home.php';
    </script>");
}

if($_SESSION['user']==null)
{
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MENGAMBIL TWEET BERDASARKAN KEYWORD DENGAN PHP</title>
</head>
<body>

<?php
 // load library TwitterOAuth
include ("connect.php");
require_once __DIR__ . '/vendor/autoload.php';
include "twitteroauth/twitteroauth.php";
include('assets/views/headlog.php');
include('assets/views/login/config.php');
mysqli_query($koneksi,"TRUNCATE TABLE `tb_steming`");

 // menentukan keyword yang akan di cari
 //$keyword = '#dirumahaja';

 // ganti dengan API twitter anda
 $key = 'iBnbpKXoe6QqgEtddULWZrtfR';
 $secret_key = 'OUtn0OdYwzo6piGD9hv4jYPhaoWrIuqPXZGp4KSsI4vZgO18vz';
 $token = '2247094207-DNHVzUZO8Slx1BYxxJDDy9nuuGu65KBGkN6fSK1';
 $secret_token = 'UvvVx3z7KAUJ1uai3r8Ok8cA9CzTaSEENgpQHhCtXsMxk';

 // membuka koneksi
 $conn = new TwitterOAuth($key, $secret_key, $token, $secret_token);

 // menagmbil tweet berdasarkan keyword yang di tentukan
 // anda bisa merubah jumlah tweet yang akan di tampilkanb dengan merubah angka pada count
 $tweets = $conn->get('search/tweets', array('q'=>$keyword, 'count'=>20));


 // menampilkan hasil keyword yang di tentukan
 echo '<h3><br><center>Keyword @'.$keyword.'</center><br></h3><hr />';
 

  ?>
  <div class="container mt-3">
  <p>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th><center>Profile</center></th>
          <th><center>Username</center></th>
          <th><center>Tweets</center></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
            foreach ($tweets->statuses as $tweet) {
            $str_id = $tweet->id_str;
            $user = $tweet->user->screen_name;
            $text = $tweet->text;
            $date = date('Y-m-d h:i:s', strtotime($tweet->created_at));
            ?>
          <tr>
            <td><img src="<?=$tweet->user->profile_image_url;?>"</td>
            <td><?php echo $user ?></td>
            <td><?php echo $text ?></td>
             <?php
			 					
            }
              ?>
          </tr>
        </tr>
      </tbody>
    </table>

  <?php

  // echo '<strong>'.$date.'</strong><br/>';
  // echo '<strong>'.$user.'</strong> : '.$text.'<br/><hr/><br/>';
 
?>
</body>
</head>
</html>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class="row justify-content-center">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <br><center><h2>TOKENIZING PROCESS</h2></center><br><br>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th><center>Username</center></th>
                    <th><center>Tweets</center></th>
                  </tr>
                </thead>
                <tbody>

          <?php 
            foreach ($tweets->statuses as $key => $tweet) { 
            $tweet;
                
                $user = $tweet->user->screen_name;
                $sql =$tweet->text;

                $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
                $tokenizer = $tokenizerFactory->createDefaultTokenizer();
                $tokens = $tokenizer->tokenize($sql);                  
          ?>

        <?php
              echo
                      "<tr>
                        <td>".$user."</td>
                        <td>".implode(' ',$tokens)."</td>
                      </tr>";
                  }
                  ?>                  
                </tbody>
              </table></center>
            </div>
          </div>
        </div>
      </div><br><br>

      <div class="row justify-content-center">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <br><center><h2>STEMMING AND CASE FOLDING PROCESS</h2></center><br><br>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th><center>Username</center></th>
                    <th><center>Tweet</center></th>
                  </tr>
                </thead>
                <tbody>
      
        <?php

        foreach ($tweets->statuses as $key => $tweet) { 
            $tweet;

        $user = $tweet->user->screen_name;
        $sql =$tweet->text;

        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer  = $stemmerFactory->createStemmer();
      
        $sentence = $sql;
        $output   = $stemmer->stem($sentence); 
        ?>      
                  <?php
                    echo "<tr>
                            <td>".$user."</td>
                            <td>".($output)."</td>";
                    echo "</tr>";
					
					$d=($output);
					mysqli_query($koneksi,"insert into tb_steming values('','$user','$sentence','$d')");
				
                  }
                  ?>
                </tbody>
				
				
              </table>
            </div>
          </div>
        </div>
      </div>
	  </div>
</body>
</div><br>
    <!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4 bg-dark">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Footer links -->
  <div class="row text-center text-md-left mt-3 pb-3 bg-dark">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold text-light bg-dark">My BdS Apps</h6>
      <p class="text-light bg-dark">Web untuk mengetahui kategori komentar secara otomatis.</p>
    </div>
    <!-- Grid column -->

    <hr class="w-100 clearfix d-md-none">

    <!-- Grid column -->
    <!-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
      <p>
        <a href="#!">MDBootstrap</a>
      </p>
      <p>
        <a href="#!">MDWordPress</a>
      </p>
      <p>
        <a href="#!">BrandFlow</a>
      </p>
      <p>
        <a href="#!">Bootstrap Angular</a>
      </p>
    </div> -->
    <!-- Grid column -->

    <hr class="w-100 clearfix d-md-none">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold text-light bg-dark">fav</h6>
      <p class="text-light bg-dark">
        <a href="about.php">About</a>
      </p>
      <p class="text-light bg-dark">
        <a href="contact.php">Contact</a>
      </p>
      
      <p class="text-light bg-dark">
        <a href="#" id="login">Help</a>
      </p>
    </div>

    <!-- Grid column -->
    <hr class="w-100 clearfix d-md-none">

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold text-light">Contact</h6>
      <p class="text-light bg-dark">
        <i class="fas fa-home mr-3"></i> Jl. Jatiwaringin belok kiri dikit</p>
      <p class="text-light bg-dark">
        <i class="fas fa-envelope mr-3"></i> mimiw@gmail.com</p>
      <p class="text-light bg-dark">
        <i class="fas fa-phone mr-3"></i> +62 812 8675 9843</p>
      <p class="text-light bg-dark"   >
        <i class="fas fa-print mr-3"></i> +62 812 8976 7864</p>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Footer links -->

  <hr>

  <!-- Grid row -->
  <div class="row d-flex align-items-center">

    <!-- Grid column -->
    <div class="col-7 col-lg-8">

      <!--Copyright-->
    
      <p class="text-center text-md-left text-light bg-dark">© 2020 Copyright:
        <a href="#">
          <strong> MyApps.com</strong>
        </a>
      </p>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-5 col-lg-4 ml-lg-0">

      <!-- Social buttons -->
      <div class="text-center text-md-right">
        <ul class="list-unstyled list-inline">
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
        </ul>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="assets/js/flame.js"></script>
</body>
</html>
