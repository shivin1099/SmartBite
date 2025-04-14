<?php
    include("config/constants.php"); 
//echo "hell";


    //echo "process delete";
        $id=$_GET['id'];
        $qty1=$_GET['qty'];
        echo $qty1;
        // $sql2="UPDATE tbl_cart SET
        // qty=$qty1
        // where cart_id=$id";

        // $res2=mysqli_query($conn,$sql2);
        if($res2==TRUE)
        {
            
            echo 'hi';
        }
        else{
            echo "fail";
        }



    ?>