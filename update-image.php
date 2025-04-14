<?php include('partial/menu.php');?>
<div class="body">
    <div class="wrapper">
        <h1 class="white text-center"></h1>
        <br>
        <br>
        
        
        
        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_food where food_id=$id";
            $res=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $current_image=$row['image_name'];
              
            }
            else
            {
                $_SESSION['error']="<div class='error'>category not found</div>";
                header('location:'.SITEURL.'admin/manage-categories.php');
            }
        }
        else
        {
            header('location:'.SITEURL.'admin/manage-categories.php');
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <div class="cat-box">
                <div class="cat-box-img">
                    <?php
                        if($current_image!="")
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>"class="img-responsive img-curve">
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>image not available</div>";
                        }
                    ?>
                    
                </div>
                <div class="cat-food-desc">
                    <h3 class="cat-title">Update image</h3>
                    <br>
                    <h4 class="cat-title"><?php echo $title?></h3>
                    <br><br>
                    <h4>Select new image</h4>
                    <input type="file" name="image">
                </div>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id ;?>">
                <input type="submit" name="submit" value="Update" class="btn fd-1 cat-btn"></input>
            </div>
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                //echo "clicked";
                $id=$_POST['id'];

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
                        $image_name = "food-name-".rand(000,999).'.'.$ext; 
    
                        $source_path=$_FILES['image']['tmp_name'];
    
                        $destination_path="../images/food/".$image_name;
    
                        $upload= move_uploaded_file($source_path,$destination_path);
                        if($upload==FALSE)
                        {
                            $_SESSION['upload']="<div class='error' >failed to uplaod image </div>";
                            header("location:".SITEURL."admin/manage-food.php");
                            die();
                        }

                        if($current_image!="")
                        {
                        $remove_path="../images/food/".$current_image;
                        $remove= unlink($remove_path);
                        if($remove==FALSE)
                        {
                            $_SESSION['failed']="<div class='error'>failed to remove current image</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }
                        }
                    }
                    else
                    {
                        $image_name=$current_image;
                    }
                }
                else
                {
                    $image_name=$current_image;
                }

                $sql2="UPDATE tbl_food SET
                    image_name='$image_name'
                    
                    where food_id=$id
                ";

                $res2=mysqli_query($conn,$sql2);

                if($res2==TRUE)
                {
                    $_SESSION['update']="<div class='sucess'>Update Sucessfull</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['update']="<div class='error'>Update Failed</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

            }
        ?>

    </div>
</div>    
<?php include('partial/footer.php');?>