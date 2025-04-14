<?php include("partial/menu.php"); ?>
    <!-- body start-->

    <div class="body">
        <div class="wrapper">
            <h1 class="text-center white">categories</h1>
            <br>
            <br>
            <a href="<?php echo SITEURL;?>admin/add-categories.php" class="btn-1">add category</a>
            <br>
            <br>
            <?php
            if(isset($_SESSION['add']))
            {
                ?>
            <div id="popup" class="popup">
            <div class="popup-content">
                <h2>!! Category Added !!</h2>
                <br>
                <p>new category added🌝</p>
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
                    window.location.href="<?php echo SITEURL ;?>admin/manage-categories.php";
                }
        
                showPopup();
                </script>
                <?php
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete']))
            {
                ?>
            <div id="popup" class="popup">
            <div class="popup-content">
                <h2>!! Category Deleted !!</h2>
                <br>
                <p>category removed sucessfully</p>
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
                    window.location.href="<?php echo SITEURL ;?>admin/manage-categories.php";
                }
        
                showPopup();
                </script>
                <?php
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['error']))
            {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['update']))
            {
                ?>
            <div id="popup" class="popup">
            <div class="popup-content">
                <h2>!! Category Updated !!</h2>
                <br>
                <p>update made sucessfully🌝</p>
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
                    window.location.href="<?php echo SITEURL ;?>admin/manage-categories.php";
                }
        
                showPopup();
                </script>
                <?php
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['failed']))
            {
                echo $_SESSION['failed'];
                unset($_SESSION['failed']);
            }
            ?>
            <table class="white tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Feartured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    $sql = 'SELECT * FROM tbl_category';
                    $res =mysqli_query($conn,$sql);
                    
                    if ($res==TRUE)
                    {
                        //row count
                        $count = mysqli_num_rows($res);

                        $sn=1;
                        if ($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //while loop to get data
                                $id=$rows['category_id'];
                                $title=$rows['title'];
                                $image_name=$rows['image_name'];
                                $featured=$rows['featured'];
                                $active=$rows['active'];

                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    
                                    <td>
                                        <?php
                                        if($image_name!="")
                                        {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">
                                        <?php
                                        }
                                        else
                                        {
                                        echo "<div class='error'>Image Not Available</div>";
                                        }
                                        ?>
                                    </td>

                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-categories.php?id=<?php echo $id; ?>" class="btn-2">Update Category</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-category-cnfrm.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-3">Delete Category</a>
                                    </td>
                                    
                                </tr>


                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            
                            <tr>
                                <td colspan="6"><div class="error">No category added</div></td>
                            </tr>
                            <?php

                        }
                    }
                    
                ?>
            </table>
            

            <div class="clearfix"></div>
        </div>
    </div>

<?php include("partial/footer.php"); ?>