
<?php

    include('../config/constants.php');

    $id =$_GET['id'];

    $sql ="DELETE FROM tbl_admin WHERE admin_id=$id";
    $res = mysqli_query($conn,$sql);

    if ($res==TRUE)
    {
        //echo "Admin Deleted";
        $_SESSION['delete']= "<div class='sucess'>Admin Deleted Sucessfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //echo "ADmin not deleted";   
        $_SESSION['delete']="<div class='error'>Failed to delete admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>