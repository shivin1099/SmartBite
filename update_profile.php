<?php include('partials-front/menu.php');?>
<div class='body-user text-white text-center'>
    <br>
        <h1 class=" text-center">Update Profile</h1>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php 


            $c_id=$_SESSION['user_id'];

            $sql="SELECT * FROM tbl_user WHERE u_id=$c_id";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);    
               
            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);
                $current_image=$row['image_name'];
                
                

                
            }
            else
            {
                    $_SESSION['error']="<div class='error'>category not found</div>";
                    header('location:'.SITEURL);
            }
        
        ?>
       
       <?php
                        if($current_image!="")
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>images/user/<?php echo $current_image;?>"class="img-update-responsive">
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>image not available</div>";
                        }
                    ?>
                    <br>
        <input type="file" name="image">
        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
        <input type="hidden" name="id" value="<?php echo $c_id ;?>">
        <br>
        <input type="submit" name="submit" value="Update" class="btn fd-1 cat-btn"></input>
        </form>

        <?php
            if(isset($_POST["submit"]))
            {
                //echo "clicked";
              

                $current_image=$_POST['current_image'];
                
             


                //update image
                if(isset($_FILES["image"]["name"]))
                {
                    //get details
                    $image_name=$_FILES['image']['name'];
                    if($image_name!='')
                    {
                        //availablee
                        $end=explode('.',$image_name);
                        $ext=end($end);

                        //rename
                        $image_name = "user-profile-".rand(000,999).'.'.$ext;
                        
    
                        $source_path=$_FILES['image']['tmp_name'];
    
                        $destination_path="images/user/".$image_name;
    
                        $upload= move_uploaded_file($source_path,$destination_path);
                        if($upload==FALSE)
                        {
                            $_SESSION['upload']="<div class='error' >failed to uplaod image </div>";
                            header("location:".SITEURL);
                            die();
                        }

                        if($current_image!="user-dummy.jpeg")
                        {
                        $remove_path="images/user/".$current_image;
                        $remove= unlink($remove_path);
                        if($remove==FALSE)
                        {
                            $_SESSION['failed']="<div class='error'>failed to remove current image</div>";
                            header('location:'.SITEURL);
                            die();
                        }
                        }
                    }
                    
                }
               
    
                $sql2="UPDATE tbl_user SET
                    image_name='$image_name'
                    where user_id=$c_id
                ";

                $res2=mysqli_query($conn,$sql2);

                if($res2==TRUE)
                {
                    $_SESSION['update']="<div class='sucess'>Update Sucessfull</div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    $_SESSION['update']="<div class='error'>Update Failed</div>";
                    header('location:'.SITEURL);
                }

            }
        ?>
</div>   
       

 

<?php include('partials-front/footer.php');?>