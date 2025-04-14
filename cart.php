<?php include('partials-front/menu.php'); ?>

<body>

    <!-- fOOD sEARCH Section Starts Here -->
     
    <section class="food-search color text-center">
        <div class="container">
            
            <h2>Cart</h2>
            <br><br>
            <a href="<?php echo SITEURL;?>event-order-cnfrm.php" class="btn-1-e">Check Out</a>
            <?php
            if(isset($_SESSION['update']))
            {
                ?>
            <div id="popup" class="popup">
            <div class="popup-content">
                <h1>!! Removed !!</h1>
                <br>
                <p>item removed</p>
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
                    window.location.href="<?php echo SITEURL ;?>cart.php";
                }
        
                showPopup();
                </script>
                <?php
                unset($_SESSION['update']);
            }
            ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
   

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container col2">
        <form action="" method="POST" enctype="multipart/form-data" >
            <?php
                $current_user=$_SESSION['user'];
                $c_uid=$_SESSION['user_id'];
                //echo $user_id; echo $_SESSION['user_id'];
                $sql="SELECT * FROM tbl_cart where user_id=$c_uid";
                $res=mysqli_query($conn,$sql);
                  $count=mysqli_num_rows($res);
                if ($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['cart_id'];
                                $food=$row['food'];
                                $price=$row['price'];
                                $qty=$row['qty'];
                                $total=$row['total'];

                                ?>
                                  <div class="food-status-box">
                                        

                                        <div class="food-status-desc">
                                            <h3><u><b><?php echo $food; ?></b></u></h3>
                                            <br>
                                            <table class='tbl-e'>
                                           
                                                <tr>
                                                    <td>Price</td>
                                                    <td>Quantity</td>
                                                    <td>Total</td>
                                                </tr>
                                                <tr>
                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                    <td>₹ <?php echo $price; ?></td>
                                                    <td><?php echo $qty;?>  piece</td>  
                                                    <td><?php echo $total;?></td>
                                                    <td><a href="<?php echo SITEURL;?>crt_remove.php?id=<?php echo $id; ?>" class="btn-2">Remove</a></td>
                                                    
                                                    
                                                    
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

            
                    </form>
                    <?php
                    if(isset($_POST['remove']))
                    {
                        $id=$_POST['id'];
                        
                        $sql2="DELETE FROM tbl_cart WHERE cart_id=$id";

                        $res2=mysqli_query($conn,$sql2);
                        if($res2==TRUE)
                        {
                            echo "hi $id";
                        } 
                        else{
                            echo "fail";
                        }

                    }

                    ?>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>