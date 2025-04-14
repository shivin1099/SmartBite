<?php include('config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Bite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
</head>


<body bgcolor="#0c1015">
  <div class="container">
    <div class="logo">
      <img src="images/logo.png" alt="Smart Bite Logo" class="img-responsive">
    </div>
    <div class="background">
    <div class="shape"></div>
    <div class="shape-2"></div>
    <div class="shape-3">
      <h1 class="head1">Welcome </h1>

    </div>
    <div class="overlay">
      <img src="images/overlay.png" alt=" overlay" class="img-size">
    </div>
    <div class="overlay2">
      <img src="images/overlay2.png" alt=" overlay" class="img-size">
    </div>
    <div class="img">
      <img src="images/burger-login.png" alt="Smart Bite Logo" class="img-size">
    </div>

      <div class="clearfix"></div>
      <form class="form-2" method="POST">
        <h3 class="text">Sign in</h3>
        <?php
        if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <label class="box1"  for="full_name">Name</label>
        <input  type="text" placeholder="Enter your name" name="full_name" required>
        <label class="box2"  for="username">Username</label>
        <input  type="text" placeholder="create username" name="username" required>
        <label class="box2"  for="password">Password</label>
        <input type="password" placeholder="create password" name="password" required>
        <label class="box2"  for="ph_no">Phone number</label>
        <input type="number" placeholder="Enter Ph-no" name="ph_no" required>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">sign up</button>
        <br>
        <p class="acnt-up">Existing Account. <a href="<?php echo SITEURL;?>login.php">Login</a></p>


      </form>
    </div>
</body>

<?php 
if(isset($_POST['submit']))
{
    //echo 'Button clicked';
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ph_no = $_POST['ph_no'];
    $image_name="user-dummy.jpeg";

    //sql query
     $sql = "INSERT INTO tbl_user SET
        full_name='$full_name',
        username='$username',
        ph_no='$ph_no',
        image_name='$image_name',
        password='$password'
    ";
    
    $res = mysqli_query($conn,$sql) or die(mysqli_error());


    if($res==TRUE)
    {
    //session variable
    $_SESSION['add']="<div class='sucess'>Sccess. Login to continue</div>";
    //redirect
    header("location:".SITEURL.'login.php');
    }
    else
    {
    $_SESSION['add']="<span style='color:#FFFFFF'>Failed to create account</span>";
    //redirect
    header("location:".SITEURL.'signup.php');
}

}
?>

</html>
