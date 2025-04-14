<?php include('../config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Bite Admin pannel</title>

    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
</head>


<body bgcolor="#0c1015">
<?php

if(isset($_SESSION['login']))
{
  echo $_SESSION['login'];
  unset ($_SESSION['login']);
}
if(isset($_SESSION['no-login-message']))
{
  ?>
  <div id="popup" class="popup">
  <div class="popup-content">
      <h2 class='black'>!! Login Required !!</h2>
      <br>
      <p class='black'>please login to access admin pannel🌝</p>
      <br>
      <button id="close-popup">OK</button>
  </div>
  </div>

      <script>
     var popup = document.getElementById("popup");
      var closePopup = document.getElementById("close-popup");

      // Show the popup box when the order is placed successfully
      function showPopup() {
      popup.style.display = "block";
      }

      // Close the popup box when the close button is clicked
      closePopup.onclick = function() {
          window.location.href="<?php echo SITEURL ;?>admin/login.php";
      }

      showPopup();
      </script>
      <?php
  unset($_SESSION['no-login-message']);
}
if(isset($_SESSION['add']))
{
  ?>
  <div id="popup" class="popup">
  <div class="popup-content">
      <h2 class='black'>!! Account created !!</h2>
      <br>
      <p class='black'>please login to access admin pannel🌝</p>
      <br>
      <button id="close-popup">OK</button>
  </div>
  </div>

      <script>
     var popup = document.getElementById("popup");
      var closePopup = document.getElementById("close-popup");

      // Show the popup box when the order is placed successfully
      function showPopup() {
      popup.style.display = "block";
      }

      // Close the popup box when the close button is clicked
      closePopup.onclick = function() {
          window.location.href="<?php echo SITEURL ;?>admin/login.php";
      }

      showPopup();
      </script>
  <?php
  unset($_SESSION['add']);
}
?>
  <div class="container">
    <div class="logo">
    <img src="../images/logo.png" alt="Smart Bite Logo" class="img-responsive">
    </div>
    <div class="background">
    <div class="shape"></div>
    <div class="shape-2"></div>
    <div class="shape-3">
      <h1 class="head1">Welcome </h1>
      <h3 class="head2">Admin panel</h3>
    </div>
    <div class="overlay">
      <img src="../images/overlay.png" alt=" overlay" class="img-size">
    </div>
    <div class="overlay2">
      <img src="../images/overlay2.png" alt=" overlay" class="img-size">
    </div>
    <div class="img">
      <img src="../images/burger-login.png" alt="Smart Bite Logo" class="img-size">
    </div>

      <div class="clearfix"></div>
      <form class="form" method="POST">
        <h3 class="text">Log in</h3>
        
        <label class="box1"  for="username">Username</label>
        <input  type="text" name="username" placeholder="Enter Username" required>

        <label class="box2"  for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">login</button>
        <br>
        
        <p class="acnt">Don't have an account.<a href="<?php echo SITEURL;?>admin/signup.php">create now</a></p>


      </form>
    </div>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
  $res=mysqli_query($conn,$sql);

  $count = mysqli_num_rows($res);
  
  if($count==1)
  {
    $_SESSION['login'] = "<div class='text-center sucess'>login sucessfull.</div>";
    $_SESSION['ad_user'] = $username;
    header('location:'.SITEURL.'admin/');
  }
  else
  {
    $_SESSION['login'] = "<div class='text-center error'>Login fail</div>";
    header('location:'.SITEURL.'admin/login.php');
  }
}

?>