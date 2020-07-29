<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Input Keyword</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
<a class="navbar-brand" href="#">My Apps</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav ml-auto">
<li class="nav-item active">
<a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
</li>
<!-- <li class="nav-item active">
<a class="nav-link" href="stopword.php">Stop Word <span class="sr-only">(current)</span></a>
</li> -->
<li class="nav-item active">
<a class="nav-link" href="index2.php">Input Keyword<span class="sr-only">(current)</span></a>
</li>
<!-- <li class="nav-item active">
<a class="nav-link" href="text_processing.php">Proses <span class="sr-only">(current)</span></a>
</li> -->
<li class="nav-item active">
<a class="nav-link" href="hasil.php">Hasil <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
<a class="nav-link" href="../assets/views/login/proslogout.php">Logout <span class="sr-only">(current)</span></a>
</li>
</ul>
</div>
</div>
</nav>
<div class="container">
  <div class="col">
<?php
if(isset($_GET['q']) && $_GET['q']!='') {
    include_once(dirname(__FILE__).'/config.php');
    include_once(dirname(__FILE__).'/lib/TwitterSentimentAnalysis.php');

    $TwitterSentimentAnalysis = new TwitterSentimentAnalysis(DATUMBOX_API_KEY,TWITTER_CONSUMER_KEY,TWITTER_CONSUMER_SECRET,TWITTER_ACCESS_KEY,TWITTER_ACCESS_SECRET);

    //Search Tweets parameters as described at https://dev.twitter.com/docs/api/1.1/get/search/tweets
    $twitterSearchParams=array(
        'q'=>$_GET['q'],
        'lang'=>'en',
        'count'=>10,
    );
    $results=$TwitterSentimentAnalysis->sentimentAnalysis($twitterSearchParams);


    ?>
    <h1>Results for "<?php echo $_GET['q']; ?>"</h1>
    <table class="table table-primary">
        <thead><tr><center>
            <td>Id</td>
            <td>User</td>
            <td>Text</td>
            <td>Twitter Link</td>
            <td>Sentiment</td></center>
        </tr></thead>
        <?php
        foreach($results as $tweet) {
            
            $color=NULL;
            if($tweet['sentiment']=='positive') {
                $color='success';
            }
            else if($tweet['sentiment']=='negative') {
                $color='danger';
            }
            else if($tweet['sentiment']=='neutral') {
                $color='light';
            }
            ?>
            <tbody>
            <tr class="bg-<?php echo $color; ?>">
                <td><?php echo $tweet['id']; ?></td>
                <td><?php echo $tweet['user']; ?></td>
                <td><?php echo $tweet['text']; ?></td>
                <td><a href="<?php echo $tweet['url']; ?>" target="_blank">View</a></td>
                <td><button type="button" class="btn btn-<?php echo $color; ?>"><?php echo $tweet['sentiment']; ?></button></td>
            </tr>
            <?php
        }
        ?>    
        </tbody>
    </table>
    <?php
}

?>
</div>
</div>  
</body>

</div>
    <!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4 bg-dark">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Footer links -->
  <div class="row text-center text-md-left mt-3 pb-3 bg-dark">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold text-light bg-dark">My Apps</h6>
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
</footer>

<!-- Footer -->
</html>
