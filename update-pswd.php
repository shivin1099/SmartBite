<?php include("partial/menu.php"); ?>
 <div class="body">
    <div class="wrapper">
        <h1 class="white text-center">Change Password</h1>
        <br>
        <br>
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
        ?>
        <form class="white form-add" action="" method="POST">
            <label  for="current_password">Current Password</label>
            <br>
            <input class="box1" name="current_password" type="password" placeholder="Current_password" >
            <br>
            <br>
            <label  for="new_password">New Password</label>
            <br>
            <input  class="box1"  name="new_password" type="password" placeholder="Enter new password" >
            <br>
            <br>
            <label  for="confirm_password">Confirm Password</label>
            <br>
            <input   class="box1"name="confirm_password" type="password" placeholder="Confirm_Password"  >
            <br>
            <br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input  class="btn" type="submit" name="submit" value="Change Password">
        </form>

    </div>
 </div>

<?php

            if(isset($_POST['submit']))
            {
                //echo "clicked";
                $id=$_POST['id'];
                $current_password=md5($_POST['current_password']);
                $new_password=md5($_POST['new_password']);
                $confirm_password=md5($_POST['confirm_password']);

                $sql="SELECT * FROM tbl_admin WHERE admin_id=$id AND password='$current_password' ";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //echo 'user found';
                        if ($new_password==$confirm_password)
                        {
                            $sql2 ="UPDATE tbl_admin SET
                                password='$new_password'
                                WHERE admin_id=$id
                                ";

                            $res2=mysqli_query($conn,$sql2);

                            if($res2==TRUE)
                            {
                                $_SESSION['user-not-found']="<div class='sucess'>Password change sucessfull.</div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                                
                            }
                            else
                            {
                                
                                $_SESSION['user-not-found']="<div class='error'>Failed to change password.</div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                        }
                        else
                        {
                            $_SESSION['password-mismatch']="<div class='error'>Password Mismatched.</div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else
                    {
                        $_SESSION['user-not-found']="<div class='error'>user not found.</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
            }

?>


<?php include("partial/footer.php"); ?>