<?php
    include("config/constants.php"); 
//echo "hell";
if(isset($_GET['id']))
{
    //echo "process delete";
        $id=$_GET['id'];
        $sql="DELETE FROM tbl_cart WHERE cart_id=$id";

            $res=mysqli_query($conn,$sql);
            if($res==TRUE)
            {
                $_SESSION['update']="<div class='sucess'>Update Sucessfull</div>";
                    header('location:'.SITEURL.'cart.php');
            }
            else{
                echo "fail";
            }

        }

        ?>
        