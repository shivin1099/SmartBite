<?php include("partial/menu.php"); ?>
    <!-- body start-->

    <div class="body">
        <div class="wrapper">
            <h1 class="text-center white">Manage Foods</h1>
            <br>
            <br>
            <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-1">Add Food</a>
            <br>
            <br>

            <?php
        if(isset($_SESSION['add']))
        {
            ?>
            <div id="popup" class="popup">
            <div class="popup-content">
                <h2>!! Food Added !!</h2>
                <br>
                <p>Food item had been added</p>
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
                    window.location.href="<?php echo SITEURL ;?>admin/manage-food.php";
                }
        
                showPopup();
                </script>
                <?php
            unset ($_SESSION['add']);
        }
        if(isset($_SESSION['delete']))
        {
            ?>
            <div id="popup" class="popup">
            <div class="popup-content">
                <h2>!! Food Deleted !!</h2>
                <br>
                <p>The selected food have been deleted</p>
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
                    window.location.href="<?php echo SITEURL ;?>admin/manage-food.php";
                }
        
                showPopup();
                </script>
                <?php

                unset ($_SESSION['delete']);
        
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
        }
      
        ?>
        <div class="food-menu">
        <div class="cont ">
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
                        $featured=$row['featured'];
                        $active=$row['active'];
                        ?>

                <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                    if($image_name=="")
                    {
                        ?>
                        <a href="<?php echo SITEURL; ?>admin/update-image.php?id=<?php echo $id; ?> " class='text-deco'><div class='error '>image not available</div></a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="<?php echo SITEURL; ?>admin/update-image.php?id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"  class="img-responsive img-curve card "></a>
                        <?php
                    }
                    ?>
                    
                </div>

                <div class="food-menu-desc">
                    <?php if($quantity>0)
                        {
                            ?>
                            <h3><?php echo $title; ?></h3>
                            <p class="food-price">₹ <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                                <br><br>
                                Quantity:<?php echo $quantity; ?> <br>
                                Featured :<?php echo $featured; ?>
                                <br>
                                Active :<?php echo $active; ?>
                            </p>
                            <br>

                            <ul class="button-list">
                                <li>
                                    <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="fd-1">update</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-food-cnfrm.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="fd-2">delete</a>

                    
                                </li>
                            </ul>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h3><?php echo $title; ?></h3>
                            <p class="food-price">₹ <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                                <br><br>
                                Quantity: 0 !! <br>
                                Featured :Unavailable
                                <br>
                                Active : Unavailable
                            </p>
                            <br>
                            <ul class="button-list">
                                <li>
                                    <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="fd-1">update</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-food-cnfrm.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="fd-2">delete</a>

                    
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                        
                </div>
            </div>



                        <?php
                    }
                }
                else
                {
                    echo "<div class='food-menu-box error text-center'><h4>FOOD NOT ADDED</h4></div>";
                }
            
            
            ?>

        

            
            <div class="clearfix"></div>

            

        </div>

</div>
            

            <div class="clearfix"></div>
        </div>
    </div>

<?php include("partial/footer.php"); ?>