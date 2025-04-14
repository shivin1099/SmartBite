<?php include("partial/menu.php"); ?>
 <div class="body">
    <div class="wrapper">
        <h1 class="white text-center">Add new Admin</h1>
        <br>
        <br>

       <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        
        
        ?>
      
        <form class="white form-add" action="" method="POST">
            <label   for="name">Full name</label>
            <br>
            <input class="box1" name="full_name" type="text" placeholder="Enter new Admin name" required>
            <br>
            <br>
            <label  for="username">Username</label>
            <br>
            <input  class="box1"  name="username" type="text" placeholder="Enter username" required>
            <br>
            <br>
            <label  for="ph_no">Phone Number</label>
            <br>
            <input   class="box1"name="ph_no" type="text" placeholder="Enter phone number"  required>
            <br>
            <br>
            <label  for="password">Password</label>
            <br>
            <input   class="box1"name="password" type="password" placeholder="Create Password"  required>
            <br>
            <br>
            <button type='submit' name='submit' class="btn-submit">Add</button>
        </form>
    </div>
 </div>




<?php include("partial/footer.php"); ?>

<?php 
if(isset($_POST['submit']))
{
    //echo 'Button clicked';
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $ph_no = $_POST['ph_no'];
    $password = md5($_POST['password']);

    //sql query
     $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        ph_no='$ph_no',
        password='$password'
    ";
    
    $res = mysqli_query($conn,$sql) or die(mysqli_error());


    if($res==TRUE)
    {
    //session variable
    $_SESSION['add']="<div class='sucess'>Admin added sucessfully</div>";
    //redirect
    header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
    $_SESSION['add']="<span style='color:#FFFFFF'>Failed to add admin</span>";
    //redirect
    header("location:".SITEURL.'admin/add-admin.php');
}

}

?>
