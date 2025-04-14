<?php include("partial/menu.php"); ?>
    <!-- body start-->

    <div class="body2">
        <div class="wrapper2">
            <h1 class="text-center white">Orders</h1>
            <br>
            <br>

            <?php
             if(isset($_SESSION['update']))
             {
                ?>
                <div id="popup" class="popup">
                <div class="popup-content">
                    <h2>!! Order Updated !!</h2>
                    <br>
                    <p>Order status updated🌝</p>
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
                        window.location.href="<?php echo SITEURL ;?>admin/manage-orders.php";
                    }
            
                    showPopup();
                    </script>
                    <?php
                 unset ($_SESSION['update']);
             }
           
            
            ?>
            <table class="white tbl-new">
                <tr>
                    <th>sl no</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Customization</th>
                    <th>Action</th>
                </tr>

                <?php
                $sql="SELECT * FROM tbl_order where status='Ready' or status='ordered' ";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                $sn=1;
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['order_id'];
                        $food=$row['food'];
                        $price=$row['price'];
                        $qty=$row['qty'];
                        $total=$row['total'];
                        $order_date=$row['order_date'];
                        $status=$row['status'];
                        $c_name=$row['customer_name'];
                        $contact=$row['customer_contact'];
                        $email=$row['customer_email'];
                        $customization=$row['customization'];

                        ?>
                            <tr>
                                <td><?php echo $sn++ ;?></td>
                                <td><?php echo $food ;?></td>
                                <td><?php echo $price ;?></td>
                                <td><?php echo $qty ;?></td>
                                <td><?php echo $total ;?></td>
                                <td><?php echo $order_date ;?></td>
                                <td><?php echo $status ;?></td>
                                <td><?php echo $c_name ;?></td>
                                <td><?php echo $contact ;?></td>
                                <td><?php echo $email ;?></td>
                                <td><?php echo $customization ;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-2">update order</a>
                                </td>
                            </tr>


                        <?php

                    }
                }
                else
                {
                    echo "<tr><td colspan='12' class='error'>ORDERS NOT AVAILABLE</td></tr>";
                }
                ?>
              
    
            </table>
            

            <div class="clearfix"></div>
        </div>
    </div>

<?php include("partial/footer.php"); ?>