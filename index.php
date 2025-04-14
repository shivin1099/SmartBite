<?php include("partial/menu.php"); ?>
    <div class="body">
        <div class="wrapper">
            <h1 class="text-center white">Dashboard</h1>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }
            ?>
            <br>
            <div class=" col-6 text-center">
            <?php
                     $sql4="SELECT sum(total) as total FROM tbl_order";
                     $res4=mysqli_query($conn,$sql4);
                     $row4=mysqli_fetch_assoc($res4);
                     $sale=$row4['total'];    
                    ?>
                <br><br><br><br><br><br><br><br>
                <h1><?php echo $sale ?></h1>
                <br>
                TOTAL SALE
            </div>
            <div class="col-4-1 text-center">
                <?php
                $sql2="SELECT * FROM tbl_food";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
                ?>
                <br>
                <h1><?php echo $count2; ?></h1>
                <br>
                FOODS
            </div>
            <div class="col-4-2 text-center">
                <?php
                $sql="SELECT * FROM tbl_category";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                ?>
                <br>
                <h1><?php echo $count; ?></h1>
                <br>
                CATERGORIES
            </div>
            <div class="col-4-3 text-center">
            <?php
                $sql3="SELECT * FROM tbl_order";
                $res3=mysqli_query($conn,$sql3);
                $count3=mysqli_num_rows($res3);
            ?>
            <br>
                <h1><?php echo $count3;?></h1>
                <br>
                ORDERS  
            </div>
            <div class="col-4-4 text-center">
            <?php
                $sql0="SELECT distinct(event_id) FROM tbl_event_order";
                $res0=mysqli_query($conn,$sql0);
                $count0=mysqli_num_rows($res0);
            ?>
                <br>
                <h1><?php echo $count0;?></h1>
                <br>
                EVENTS
            </div>
            <div class="col-5 ">
            <?php
                     $sql5="SELECT * FROM tbl_order where status='ordered'";
                     $res5=mysqli_query($conn,$sql5);
                     $count5=mysqli_num_rows($res5);
                    ?>
             <?php
                     $sql6="SELECT * FROM tbl_order where status='delivered'";
                     $res6=mysqli_query($conn,$sql6);
                     $count6=mysqli_num_rows($res6);
                    ?>      
            <?php
                     $sql7="SELECT * FROM tbl_food where active='yes'";
                     $res7=mysqli_query($conn,$sql7);
                     $count7=mysqli_num_rows($res7);
                    ?>   
             <?php
                     $sql8="SELECT * FROM tbl_food where featured='yes'";
                     $res8=mysqli_query($conn,$sql8);
                     $count8=mysqli_num_rows($res8);
                    ?>
            <?php
                     $sql9="SELECT * FROM tbl_category where active='yes'";
                     $res9=mysqli_query($conn,$sql9);
                     $count9=mysqli_num_rows($res9);
                    ?> 
            <?php
                     $sql10="SELECT * FROM tbl_category where featured='yes'";
                     $res10=mysqli_query($conn,$sql10);
                     $count10=mysqli_num_rows($res10);
                    ?>   
                <table class='col-dash'>
                    <tr>
                        <th class='text-center'>Pending orders</th>
                        <th class='text-center'>Orders Delivered</th>
                        <th colspan=2 class='text-center'>Foods</th>
                        <th colspan=2 class='text-center'>Cartegories</th>
                    </tr>
                    <tr>
                        <td class='text-center'><?php echo $count5 ?></td>
                        <td class='text-center'><?php echo $count6 ?></td>
                        <td >active :<?php echo $count7 ?></td>
                        <td>featured :<?php echo $count8 ?></td>
                        <td>active :<?php echo $count9 ?></td>
                        <td>featured :<?php echo $count10 ?></td>
                    </tr>
                   
                </table>
                <br>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <?php include("partial/footer.php"); ?>