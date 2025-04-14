<?php
    include("../config/constants.php"); 
//echo "hell";
if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //echo "process delete";
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];


    if($image_name!='')
    {
        $path="../images/food/".$image_name;
        $remove=unlink($path);
        if($remove==FALSE)
        {
            $_SESSION['upload']="<div class='error'>failed to remove image file</div>";
            header('location:'.SITEURL."admin/manage-food.php");
            die();

        }
    }
    $sql="DELETE FROM tbl_food WHERE food_id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        $_SESSION['delete']="<div class='sucess'>Food deleted Sucessfuly</div>";
        header('location:'.SITEURL."admin/manage-food.php");
    }
    else
    {
        $_SESSION['delete']="<div class='error'>Food delete Failed</div>";
        header('location:'.SITEURL."admin/manage-food.php");     
    }
}
else
{
    $_SESSION['delete']="<div class='error'>Unauthorized access</div>";
    header('location:'.SITEURL."admin/manage-food.php");
}

?>
