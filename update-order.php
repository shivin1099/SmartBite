<?php include('partial/menu.php');?>
<div class="body">
    <div class="wrapper">
        <h1 class="white text-center">Update Order Status</h1>
        <br>
        <br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $sql="SELECT * FROM tbl_order WHERE order_id=$id";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $customer_name=$row['customer_name'];
                    $food=$row['food'];
                    $status=$row['status'];


                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-orders.php');  
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-orders.php');
            }
        
        ?>
        <form action="" method="POST">
        <table class="white tbl-30">
            <tr>
                <td>Customer Name</td>
                <td><b><?php echo $customer_name; ?></b></td>
            </tr>
            <tr>
                <td>Food Name</td>
                <td><?php echo $food; ?></td>
            </tr>
          
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" >
                        <option <?php if($status=='Ordered'){echo "selected";}?> value="Ordered">Ordered</option>
                        <option <?php if($status=='Ready'){echo "selected";}?> value="Ready">Ready</option>
                        <option <?php if($status=='Delivered'){echo "selected";}?> value="Delivered">Delivered</option>
                        
                    </select>
                </td>
            </tr>
           
            <br><br>
            <tr>
            <td colspan="2">
                <input type="hidden" name="id">
                <input type="submit" name="submit" value="update" class="btn-2">
            </td>
            </tr>
        </table>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
          
            $status=$_POST['status'];

            $sql2="UPDATE tbl_order SET
                status='$status'
                WHERE order_id=$id
            
            ";

            $res2=mysqli_query($conn,$sql2);
            //echo $sql2; die();

            if($res2==TRUE)
            {
            
                $_SESSION['update']="<div class='sucess'>Update Sucessfull</div>";
                header('location:'.SITEURL.'admin/manage-orders.php');
            }
            else{
                $_SESSION['update']="<div class='sucess'>Update Fail</div>";
                header('location:'.SITEURL.'admin/manage-orders.php');
            }

        }


        ?>
    </div>
</div>    
<?php include('partial/footer.php');?>