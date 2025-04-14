<?php include('partials-front/menu.php'); ?>
<?php
    if(isset($_GET['food_id']))
    {
        $food_id=$_GET['food_id'];
        $sql="SELECT * FROM tbl_food WHERE food_id=$food_id";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);
            $title=$row['title'];
            $price=$row['price'];
            $quantity=$row['quantity'];
            $image_name=$row['image_name'];
            $uid=$_SESSION['user_id'];
        }
        else
        {
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location:'.SITEURL);

    }

?>
<body>
    <!-- Navbar Section Starts Here -->

    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search color">
        <div class="container ">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method='POST' class="order text-white" >
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                            if($image_name=="")
                            {
                                echo "<div class='error'>image not available</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL ;?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                    
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="hidden" name="user_id" value="<?php echo $uid;?>"> 
                        <input type="hidden" name="image_name" value="<?php echo $image_name; ?>">
                        <p class="food-price">₹ <?php echo $price; ?></p>
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" max="<?php echo $quantity;?>" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend class="col3">Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="  Enter your name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 1234xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. youremail@gmail.com" class="input-responsive" required>

                    <div class="order-label">Customization</div>
                    <textarea name="customization" rows="10" placeholder="  Enter your custom requirment..." class="input-responsive" ></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            
            if(isset($_POST['submit']))
            {
                $food=$_POST['food'];
                $uid=$_POST['user_id'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $total=$price * $qty;
                $order_date= date("y-m-d");
                $status="Ordered";
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customization=$_POST['customization'];


                $sql2="INSERT INTO tbl_order SET
                    food='$food',
                    user_id=$uid,
                    price=$price,
                    qty=$qty,
                    image_name='$image_name',
                    total=$total,
                    order_date='$order_date',
                    status='$status',
                    customer_name='$customer_name',
                    customer_contact='$customer_contact',
                    customer_email='$customer_email',
                    customization='$customization'
                ";

                $sql3="UPDATE tbl_food SET
                quantity=quantity-$qty where food_id=$food_id
                ";
                $res3= mysqli_query($conn,$sql3);

                $res2= mysqli_query($conn,$sql2);
                if($res2==TRUE)
                {
                    ?>
                    <script>
                        window.location.href="<?php echo SITEURL ;?>payment.php";
                    </script>
                    <?php
                    $_SESSION['order']="<div class='sucess text-center'>ORDER PLACED</div>";
                    //header('location:'.SITEURL);
                }
                else
                {
                    $_SESSION['order']="<div class='sucess text-center'>ORDER FAILED</div>";
                    header('location:'.SITEURL);
                }



            }
            ?>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>