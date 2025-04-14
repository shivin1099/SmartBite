<?php include('partials-front/menu.php'); ?>
<body>
    <!-- Navbar Section Starts Here -->
 
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search color">
        <div class="container ">
        <h2 class="text-center text-white">Fill this form to confirm event reservation</h2>

        <form action="" method='POST' class="order text-white">
        <fieldset>
        <legend>Selected Foods</legend>
        <?php
                $current_user=$_SESSION['user_id'];
                $c_uid=$_SESSION['user_id'];
                $sql="SELECT * FROM tbl_cart where user_id=$c_uid";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                $sn=1;
                $ord_id=rand(0000,9999);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        
                        $title=$row['food'];
                        $qty=$row['qty'];
                        $amt=$row['price'];
                        $food_id=$row['food_id'];
                        ?>
                    <div class="food-menu-desc">
                        <p></p>
                        <p class="food-price"><?php echo $sn++; ?>)  <?php echo $title;?></p>
                        <p>₹ <?php echo $amt;?></p>
                        <div class="order-label">Number of Pieces : <?php echo $qty;?></div>
                        <p>***********************</p>
                        <br>
                        
                        
                    </div>

       
                
              
            <?php
                    }
                }
                        ?>
                    </fieldset>
                    <fieldset>
                    <legend class="col3">Details</legend>
                    <?php
                    $sql1="SELECT * from tbl_user where u_id=$c_uid";
                    $res1=mysqli_query($conn,$sql1);
                    if($count>0)
                    {
                        while($row1=mysqli_fetch_assoc($res1))
                        {
                            
                            $name=$row1['full_name'];
                            $ph=$row1['ph_no'];
                            
                        }
                    }

                    ?>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" value="<?php echo $name;?>" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" value="<?php echo $ph;?>" class="input-responsive" required>

                    <div class="order-label">Date</div>
                    <input type="date" name="date" value="" class="input-responsive" required>

                    <br>
                    <?php
                    $sql2="SELECT SUM(total) FROM tbl_cart where user_id=$c_uid";
                    $res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($res2);
                    $sum=$row2['SUM(total)'];
                    $adv=$sum/2;


                    ?>
                    <h4>Advance Amount</h4>
                    <p class="total">₹ <?php echo $adv;?></p>
                    <p class="adv-amt"></p>
                    <h4>Total Amount</h4>
                    <p class="total">₹ <?php echo $sum;?></p>
                    <br>
                    <?php
                    for($i=1;$i<=$count;$i++)
                    {
                    ?>
                    <input type="hidden" name="<?php echo $i.'event_id';?>" value="<?php echo $ord_id;?>">
                    <input type="hidden" name="<?php echo $i.'food_id';?>" value="<?php echo $food_id;?>">
                    <input type="hidden" name="<?php echo $i.'user_id';?>" value="<?php echo $c_uid;?>">
                    <input type="hidden" name="<?php echo $i.'qty';?>" value="<?php echo $qty;?>">
                    <input type="hidden" name="<?php echo $i.'total';?>" value="<?php echo $sum;?>">
                    <?php
                    }
                    ?>
                    <input type="submit" name="enter" value="Confirm Order" class="btn btn-primary">
                    <?php
                    ?>
                </fieldset>

            </form>
        
        </div>
    </section>
    <?php 
if(isset($_POST['enter']))
{
    $sql5="SELECT * FROM tbl_cart where user_id=$c_uid";
                $res5=mysqli_query($conn,$sql5);
                $count5=mysqli_num_rows($res5);
                if($count5>0)
                {
                    while($row5=mysqli_fetch_assoc($res5))
                    {
                        
                        $qty=$row5['qty'];
                        $food_name=$row5['food'];
                        $event=$ord_id;
                        

                     
                         //echo 'Button clicked';
                         for($i=1;$i<=$count;$i++){
                         $user_id = $_POST[$i.'user_id'];
                         $total = $_POST[$i.'total'];
                         $order_date=$_POST['date'];
                         $name=$_POST['full-name'];
                         }
                     
                         //sql query
                          $sql7 = "INSERT INTO tbl_event_order SET
                             event_id=$event,
                             user_id=$user_id,
                             name='$name',
                             food_name='$food_name',
                             quantity=$qty,
                             total=$total,
                             date='$order_date'
                         ";
                         
                         $res7 = mysqli_query($conn,$sql7) ;
                    }
                }
  


    if($res7==TRUE)
    {
    //session variable
    $sql1 ="DELETE FROM tbl_cart WHERE user_id=$c_uid";
    $res1 = mysqli_query($conn,$sql1) ;
    $_SESSION['add']="<div class='sucess'>Admin added sucessfully</div>";
    ?>
                        <script>
                            window.location.href="<?php echo SITEURL ;?>payment.php";
                            
                        </script>
                        <?php
                        $_SESSION['order']="<div class='sucess text-center'>ORDER PLACED</div>";
    //redirect
   
    }

}

?>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>
    
