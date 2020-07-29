        <!-- login -->
        <div id="login" class="modal">
<span onclick="document.getElementById('login').style.display='none'" class="close" title="Cancel">&times;</span>
  <form class="modal-content animate" action="assets/views/login/proslog.php" method="GET">
    <div class="imgcontainer">
      
      <img src="assets/img/account.png" alt="register" class="avatar">
    </div>

    <div class="container">
      <label for="user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" id="user" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container justify-content-center" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<!-- endlogin -->
<!-- 
<script>
    // Get the modal
    var modal = document.getElementById('login');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script> -->