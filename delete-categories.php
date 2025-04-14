<?php
include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id= $_GET['id'];
    $image_name= $_GET['image_name'];

    if ($image_name!="")
    {
        $path="../images/category/".$image_name;
        $remove = unlink($path);

        if ($remove==FALSE)
        {
            $_SESSION['remove']="<div class='error'>Failed to remove category image</div>";
            header('location:'.SITEURL.'admin/manage-categories.php');
            die();
        }
    }
$sql="DELETE FROM tbl_category WHERE category_id=$id";
$res=mysqli_query($conn,$sql);

if($res==TRUE)
{
    $_SESSION['delete']="<div class='sucess'>category delete sucess</div>";
    header('location:'.SITEURL.'admin/manage-categories.php');
}
else
{
    $_SESSION['delete']="<div class='error'>category delete failed</div>";
    header('location:'.SITEURL.'admin/manage-categories.php');
}


}
else
{
    header('location:'.SITEURL.'admin/manage-categories.php');
}

?>