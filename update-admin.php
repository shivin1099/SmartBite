<?php include('partial/menu.php');?>

<div class="body">
    <div class="wrapper">
        <h1 class="white text-center">Update Admin</h1>
        <br>
        <br>

        <?php
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_admin WHERE admin_id=$id";
            $res=mysqli_query($conn,$sql);
            //check executed
            if ($res==TRUE)
            {
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    //echo 'admin available';
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username =$row['username'];

                }
                else
                {
                    header('location:'.SITEURL.'admin/manage_admin.php');
                }
            }    
        ?>
        <form class="white form-add" action="" method="POST">
            <br>
            <label   for="username">Full name</label>
            <br>
            <input class="box1" name="full_name" type="text" value="<?php echo $full_name;?>" >
            <br>
            <br>
            <label  for="username">Username</label>
            <br>
            <input  class="box1"  name="username" type="text" value="<?php echo $username;?>">
            <br>
            <br>
            
            <br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type='submit' name='submit' class="btn-submit">Update</button>
        </form>
    </div>
</div>

<?php

//button click
if(isset($_POST['submit']))
{
    //echo "button clicked";
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];


    $sql="UPDATE tbl_admin SET
    full_name='$full_name',
    username='$username'
    WHERE admin_id='$id'
    ";

    $res =mysqli_query($conn,$sql);

    if($res==TRUE)
    {
        $_SESSION['update']="<div class='sucess'>Admin Updated</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update']="<div class='error'>Failed to update Admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}




?>


<?php include('partial/footer.php');?>