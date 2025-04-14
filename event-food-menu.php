<?php include('partials-front/menu.php'); ?>

    <!-- body start-->

    <div class="body-e">
        <div class="wrapper-e">
            <h1 class="text-center white">Book Events</h1>
            <br>
            <br>
            <a href="<?php echo SITEURL;?>cart.php" class="btn-1-e">Cart</a>
            <br>
            <br>
            <?php
            $uid=$_SESSION['user_id'];
            ?>
        <div class="food-menu-e">
        <div class="cont-e">
           <?php
                $sql="SELECT * FROM tbl_food";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['food_id'];
                        $title=$row['title'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $image_name=$row['image_name'];
                        $quantity=$row['quantity'];
                        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="food-menu-box-e">
                <div class="food-menu-img-e">
                    <?php
                    if($image_name=="")
                    {
                        ?>
                        <a href="<?php echo SITEURL; ?>event-food-menu.php" class='text-deco'><div class='error '>image not available</div></a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="<?php echo SITEURL; ?>event-food-menu.php"><img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"  class="img-responsive-e img-curve-e card "></a>
                        <?php
                    }
                    ?>
                    
                </div>

                <div class="food-menu-desc-e">
                    
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">₹ <?php echo $price; ?></p>
                            <p class="food-detail">
                   
                                <br><br>
                            <p>Quantity</p>
                            <p><input type="number" name='quantity' value="1"></p>
                            
                            </p>
                            <br>
                            <div class="button-list">
                            <input type="hidden" name="food_id" value="<?php echo $id;?>">
                            <input type="hidden" name="food" value="<?php echo $title;?>">
                            <input type="hidden" name="price" value="<?php echo $price;?>">
                            <input type="hidden" name="user_id" value="<?php echo $uid;?>"> 
                            <input type="submit" name="submit" value="Add to Cart" class="fd-1-e btn-e"></input>

        </form>
                                
                </div>
                        
                        
                </div>
            </div>
            <?php
                }
            } 
            else
                {
                    echo "<div class='food-menu-box error text-center'><h4>FOOD NOT ADDED</h4></div>";
                }
            
             
                if(isset($_POST['submit']))
               
                {
                    $food=$_POST['food'];
                    $uid=$_POST['user_id'];
                    $food_id=$_POST['food_id'];
                    $price=$_POST['price'];
                    $qty=$_POST['quantity'];
                    $total=$price * $qty;
    
    
                    $sql2="INSERT INTO tbl_cart SET
    
                        user_id=$uid,
                        food='$food',
                        food_id='$food_id',
                        price=$price,
                        qty=$qty,
                        total=$total
                    ";
                    $res2= mysqli_query($conn,$sql2);
                    if($res2==TRUE)
                    {
                        $_SESSION['update'];
                        ?>
                        <div id="popup" class="popup">
                        <div class="popup-content">
                        <h1 color="black">Added to Cart</h1>
                        <br>
                        <p> food has been added to cart</p>
                        <br>
                        <button id="close-popup">Continue</button>
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
                            window.location.href="<?php echo SITEURL ;?>event-food-menu.php";
                        }
                        showPopup();
                        </script>

                        <?php
                    
                 
                        //header('location:'.SITEURL);
                    }
                    else
                    {
                        ?>
                        <script>
                            window.location.href="<?php echo SITEURL ;?>event-food-menu.php";
                        </script>
                        <?php
                    }
                }
            ?>
            <div class="clearfix"></div>
        </div>
</div>
            <div class="clearfix"></div>
        </div>
    </div>

<?php include("partials-front/footer.php"); ?>