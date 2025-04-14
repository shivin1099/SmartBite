<?php include('partial/menu.php'); ?>

<body>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search color text-center">
        <div class="container">
            
            <h2 class="white">Your Orders</h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container col2">

            <?php

                
                //echo $user_id; echo $_SESSION['user_id'];
                $sql3="SELECT * from tbl_user ";
                $res3=mysqli_query($conn,$sql3);
                while($row=mysqli_fetch_assoc($res3))
                            {
                                $user=$row['full_name'];
                                
                            }
                            
                $sql="SELECT distinct(event_id) FROM tbl_event_order ";
                $res=mysqli_query($conn,$sql);
                  $count=mysqli_num_rows($res);
                  $c=0;
                if ($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $c++;
                                $event=$row['event_id'];
                                
                                $sql4="SELECT * FROM tbl_event_order where event_id=$event ";
                                $res4=mysqli_query($conn,$sql4);
                                $count4=mysqli_num_rows($res4);
                                if ($count4>0)
                                {
                                    while($row4=mysqli_fetch_assoc($res4))
                                    {
                                        $date=$row4['date'];
                                        $name=$row4['name'];
                                    }
                                }

                                ?>
                                  <div class="food-status-box">
                                       

                                        <div class="food-status-desc">
                                            <h3><u><b><?php echo "Order $c"; ?></b></u></h3>
                                            <br>
                                            <h4><b><?php echo "Ordered by :$name"; ?></b></h4>
                                            <h5><b><?php echo "Date $date"; ?></b></h5>
                                           
                                            <table class='tbl-50'>
                                           
                                                <tr>
                                                    <td>Items</td>
                                                    <td>quantity</td>
                                                    
                                                </tr>
                                                <tr>
                                               <?php $sql2="SELECT * FROM tbl_event_order where event_id=$event ";
                                                $res2=mysqli_query($conn,$sql2);
                                                $count2=mysqli_num_rows($res2);
                                                if ($count2>0)
                                                {
                                                    while($row2=mysqli_fetch_assoc($res2))
                                                    {
                                                        $food_name=$row2['food_name'];
                                                        $qty=$row2['quantity'];

?>                                                     <tr>
                                                    <td><?php echo $food_name;?></td>
                                                    <td><?php echo $qty;?></td>
                                                     </tr>
                                                <?php
                                                    }
                                                }
                                                ?>



                                            </table>
                                        </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        

                                        </div>
                                    </div>

                                <?php
                            }
                        
                    
            ?>

          
            

         
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partial/footer.php'); ?>