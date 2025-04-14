<?php include('partials-front/menu.php'); ?>

<?php 
    if(isset($_GET['category_id']))
    {
        $category_id=$_GET['category_id'];
        $sql2="SELECT title FROM tbl_category WHERE category_id=$category_id";

        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        $category_title=$row2['title'];

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
    <section class="food-search color text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container col2">
            <h2 class="text-center">Food Menu</h2>
            <?php
            
                $sql="SELECT * FROM tbl_food WHERE category_id=$category_id";
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