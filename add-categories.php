<?php include("partial/menu.php"); ?>
    <!-- body start-->
    <div class="body">
        <div class="wrapper">
            <h1 class="text-center white">Add categories</h1>
            <br><br>
            <?php
                if(isset($_SESSION["upload"]))
                {
                    echo $_SESSION["upload"];
                    unset($_SESSION["upload"]);
                }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="white tbl-full">
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" placeholder="category title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image :</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured :</td>
                        <td>
                            <input type="radio" name="featured" value="yes">Yes
                            <input type="radio" name="featured" value="no">no
                        </td>
                    </tr>

                    <tr>
                        <td>Active :</td>
                        <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"> 
                            <input type="submit" name="submit" value="add category" class="btn-1">
                        </td>
                    </tr>
                </table>
            </form>


            
            <?php 
            if(isset($_POST["submit"]))
            {
                //echo "clicked";
                $title = $_POST['title'];
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "no";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];

                }
                else
                {
                    $active = "no";
                }

                //image processing
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name !="")
                    {

                    
                    //rename image
                    $ext = end(explode('.',$image_name));

                    //rename
                    $image_name = "food_category_".rand(000,999).'.'.$ext; 

                    $source_path=$_FILES['image']['tmp_name'];

                    $destination_path="../images/category/".$image_name;

                    $upload= move_uploaded_file($source_path,$destination_path);
                    if($upload==FALSE)
                    {
                        $_SESSION['upload']="<div class=error >failed to uplaod image </div>";
                        header("location:".SITEURL."admin/add-categories.php");
                        die();
                    }
                    }
                }
                else
                {
                    $image_name="";
                }
                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    ";

                $res = mysqli_query($conn,$sql);

                if($res==TRUE)
    {
    //session variable
    $_SESSION['add']="<div class='sucess'>Category added sucessfully</div>";
    //redirect
    header("location:".SITEURL.'admin/manage-categories.php');
    }
    else
    {
    $_SESSION['add']="<div class='error'>Failed to add admin</div>";
    //redirect
    header("location:".SITEURL.'admin/manage-categories.php');
}

            }
            ?>
        </div>
    </div>



<?php include("partial/footer.php"); ?>