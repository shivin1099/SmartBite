<?php include('partials-front/menu.php'); ?>

<body>
    <!-- Navbar Section Starts Here -->
  
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search color text-center">
        <div class="container ">
            <?php
            $search=$_POST['search'];
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container col2">
            <h2 class="text-center">Food Menu</h2>
            <?php
               

                $sql="SELECT * from tbl_food WHERE title like '%$search%' or description like '%$search%'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if ($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['food_id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['description'];
                        $image=$row['image_name'];


                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                            <?php
                            if($image=="")
                            {
                                echo "<div class='error'>image not available</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL ;?>images/food/<?php echo $image ; ?>" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
                    
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title ;?></h4>
                                <p class="food-price">₹ <?php echo $price ;?></p>
                                <p class="food-detail">
                                    <?php echo $description ;?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order-cnfrm.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='food-menu-box error text-center'><h4>FOOD NOT AVAILABLE</h4></div>";
                }
            
            ?>

 


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>