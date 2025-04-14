<?php include('partials-front/menu.php'); ?>

<body>
   
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search  color">
        <div class="container text-center">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <br>
                <input type="search" name="search" placeholder="Search for Food.." class="searchbar" required>
                <input type="submit" name="submit" value="Search" class="button">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu color">
        <div class="container col2">
            <h2 class="text-center">Food Menu</h2>
            
            <?php
            $sql="SELECT * FROM tbl_food WHERE quantity > 0 AND active='yes'";
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
                    $image_name=$row['image_name'];

                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img"><?php
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
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">₹ <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
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

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>