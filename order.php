<?php include('partials-front/menu.php'); ?>

<body>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search color text-center">
        <div class="container">
            
            <h2>Your Orders</h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container col2">

            <?php
                $current_user=$_SESSION['user'];
                $c_uid=$_SESSION['user_id'];
                //echo $user_id; echo $_SESSION['user_id'];
                $sql="SELECT * FROM tbl_order where user_id=$c_uid";
                $res=mysqli_query($conn,$sql);
                  $count=mysqli_num_rows($res);
                if ($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                
                                $food=$row['food'];
                                $price=$row['total'];
                                $image_name=$row['image_name'];
                                $qty=$row['qty'];
                                $status=$row['status'];
                                $date=$row['order_date'];

                                ?>
                                  <div class="food-status-box">
                                        <div class="food-status-img">
                                            <?php
                                                if($image_name=="")
                                                {
                                                    echo "<div class='error img-status-responsive img-curve'>image not available</div>";
                                                }
                                                else
                                                {
                                                    ?>
                                                    <img src="<?php echo SITEURL ;?>images/food/<?php echo $image_name; ?>" class="img-status-responsive img-curve">
                                                    <?php
                                                }
                                            ?>
                                        </div>

                                        <div class="food-status-desc">
                                            <h3><u><b><?php echo $food; ?></b></u></h3>
                                            <table class='tbl-50'>
                                           
                                                <tr>
                                                    <td>price</td>
                                                    <td>quantity</td>
                                                    <td>Date</td>
                                                    <td>status</td>
                                                </tr>
                                                <tr>
                                                    <td>₹ <?php echo $price; ?></td>
                                                    <td><?php echo $qty;?></td>
                                                    <td><?php echo $date;?></td>
                                                    <td><?php echo $status;?></td>
                                                    
                                                    
                                                </tr>
                                                <tr>
                                                    <td>  
                                                    
                                                    </td>
                                                </tr>

                                            </table>
                                        

                                        </div>
                                    </div>

                                <?php
                            }
                        }
                    
            ?>

          
            

         
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>