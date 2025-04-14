<?php include('partial/menu.php');?>
<div class="body">
    <div class="wrapper">
        <h1 class="white text-center">Confirm Delete</h1>
        <br>
        <br>

        <?php

        
        if(isset($_GET['id']) && isset($_GET['image_name']))
        {
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_category where category_id=$id";
            $res=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $current_image=$row['image_name'];
          
                
            }
           
        }
       
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <div class="del-fd-box">
                <div class="cat-box-img">
                    <?php
                        if($current_image!="")
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image;?>"class="img-responsive img-curve">
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>image not available</div>";
                        }
                    ?>
                    
                </div>

                <div class="cat-food-desc">
                    <h3 class="cat-title"><?php echo $title; ?></h3>
                    <br>
                    <p class="food-detail cat-title">Do you want to delete the category</p>

                    
                    
                    <br>
                    <a href="<?php echo SITEURL;?>admin/delete-categories.php?id=<?php echo $id;?>&image_name=<?php echo $current_image; ?>" class="del-1 cat-btn">Yes</a>
                    <a href="<?php echo SITEURL;?>admin/manage-categories.php" class="del-1 cat-btn">No</a>

                </div>
            </div>
            
        </form>    
        

    </div>
</div>    
<?php include('partial/footer.php');?>