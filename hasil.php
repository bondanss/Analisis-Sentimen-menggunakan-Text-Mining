<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>

<?php
include('assets/views/headlog.php');
include('assets/views/login/config.php');
require_once __DIR__ . '/autoload.php';
$sentiment = new \PHPInsight\Sentiment();
include('assets/views/login/config.php');
$data = mysqli_query($koneksi,"SELECT * FROM tb_steming");
if($data==null){
	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('SIlakan Input Keyword');
    window.location.href='home.php';
    </script>");
}
?>	
 <div class="container mt-3">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th><center>Username</center></th>
          <th><center>Tweets</center></th>
          <th><center>Arah Sentiment</center></th>
        </tr>
      </thead>
      <tbody>
        <tr>
		<?php
         
			while($row = mysqli_fetch_array($data)){
				$tweets=	$row['tweet'];
				$user=$row['username'];
				$daga=$row['steming'];
				$scores  = $sentiment->score(@$daga);
				$class = $sentiment->categorise($daga);
				
							if (in_array("pos", $scores)) {
								echo "Got positif";
							}
							?>
          <tr>
            <td><?php echo $user ?></td>
            <td><?php echo $tweets ?></td>
            <td><?php echo $class ?></td>
             <?php

             mysqli_query($koneksi,"insert into tb_training values('','$user','$tweets','$class')");
			 					
            }
              ?>
          </tr>
        </tr>
      </tbody>
    </table>
	
	</div>
	</div>
	</div>
	
	
	
	</body> <br>
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
          <strong> MyBdSApps.com</strong>
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

	</html>
	
	
