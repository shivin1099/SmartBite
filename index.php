<?php include('partials-front/menu.php'); ?>

<?php $u_name=$_SESSION['user'];?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search  color">
        <div class='text-white m-right'>  
        <?php 
            $c_id=$_SESSION['user_id'];
            $sql3="SELECT * FROM tbl_user WHERE u_id=$c_id";
            $res3=mysqli_query($conn,$sql3);
            $count3=mysqli_num_rows($res3);    
            
            if($count3==1)
            {
                $row3=mysqli_fetch_assoc($res3);
                $us_image=$row3['image_name']; 
                $us_name=$row3['full_name']  ;
            }
        ?>
                <a href="<?php echo SITEURL; ?>update_profile.php"><img src="<?php echo SITEURL;?>images/user/<?php echo $us_image;?>" alt="profile" class="img-ac-responsive  ac-curve"></a>
                <h5 ><?php echo $us_name;?></h5>
                <h6 ><a class='ac' href="<?php echo SITEURL; ?>logout.php">logout</a></h6>
        </div>
        <div class="container text-center">
            
            <form action="<?php echo SITEURL ; ?>food-search.php " method="POST">
                <br>
                <input type="search" name="search" placeholder="Search for Food.." class="searchbar" required>
                <input type="submit" name="submit" value="Search" class="button">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php

    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset ($_SESSION['login']);
    }

    if(isset($_SESSION['order']))
    {
        ?>
        <div id="popup" class="popup">
            <div class="popup-content">
                <h2 class='black'>!! Order Placed !!</h2>
                <br>
                <p>We have received your order</p>
                <br>
                <button id="close-popup">OK</button>
            </div>
            </div>
        
                <script>
               var popup = document.getElementById("popup");
                var closePopup = document.getElementById("close-popup");
        
                // Show the popup box when the order is placed successfully
                function showPopup() {
                popup.style.display = "block";
                }
        
                // Close the popup box when the close button is clicked
                closePopup.onclick = function() {
                    window.location.href="<?php echo SITEURL ;?>";
                }
        
                showPopup();
                </script>
        <?php
        unset($_SESSION['order']);
    }
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories color">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
            $sql="SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' LIMIT 4";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['category_id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];

                    ?>
                    
                    <a href="<?php echo SITEURL;?>food-category.php?category_id=<?php echo $id?>">
                        
                        <div class="card float-container">
                            <?php
                                if($image_name=='')
                                {
                                    ?>    
                                    <img src="<?php echo SITEURL;?>images/category/no-img.jpg"  class="img-responsive img-curve">
                                    <?php
                                }
                                else
                                {
                                    ?> 
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                    <?php
                                }

                            ?>
                            
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                echo "<div class='error'>category not added</div>";
            } 
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu color">
        <div class="container col2">
            <h2 class="text-center">Food Menu</h2>
            
            <?php
            $sql2="SELECT * FROM tbl_food WHERE quantity > 0 AND active='yes' AND featured='yes' LIMIT 9";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);

            if ($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
                {
                    $id=$row['food_id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];

                    ?>
                    <div class="food-menu-box">
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
            ?>
            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->


    <?php include('partials-front/footer.php'); ?>