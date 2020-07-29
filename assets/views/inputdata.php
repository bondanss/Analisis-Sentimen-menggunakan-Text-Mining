 <?php



if($_SESSION['user']==null)
{
    header("location:index.php");
}

?>
  <body>

 <center><h2>Masukan Kata Stopword</h2>  </center>
<center><div class="container mt-3">
        <form action="assets/views/login/proses.php" method="GET">
              <div class="form-group row">
                <label for="stopword" class="col-sm-2 col-form-label">Stopword</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="stopword" id="stopword" placeholder="Kata Stopword">
                </div>
           </div>
            
            
            <div class="form-group pt-4 ml-4">
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                
            </div>
        </form>
    </div> </center>

  