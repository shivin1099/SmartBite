<?php include('partial/menu.php');?>
<?php
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $img_id=$_GET['image_name'];
    $sql2="SELECT * FROM tbl_food WHERE food_id='$id'";
    $res2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($res2);
    $title=$row2['title'];
    $description=$row2['description'];
    $price=$row2['price'];
    $current_image=$row2['image_name'];
    $current_category=$row2['category_id'];
    $quantity=$row2['quantity'];
    $featured=$row2['featured'];
    $active=$row2['active'];
}
else
{
    ?>
    <script>
        window.location.href="<?php echo SITEURL ;?>admin/manage-food.php";
    </script>
    <?php
}
?>
<div class="body">
    <div class="wrapper">
        <h1 class="white text-center">Update Food</h1>
        <br>
        <br>

        <form action="" method="POST" enctype="multipart/form-data" >
            <table class="white tbl-full">
            <tr>
                <td>Title</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?> ">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" cols='30' rows='5'><?php echo $description;?> </textarea>
                </td>
            </tr>

            <tr>
                <td>Price</td>
                <td>
                    <input type="text" name="price" value="<?php echo $price;?> ">
                </td>
            </tr>
            <tr>
                <td>Current Image</td>
                <td>
                    <?php
                        if($current_image=='')
                        {
                            echo "<div class='error'>Image Not Available</div>";
                        }
                        else
                        {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                        <?php
                        }
                    ?>
                </td>
            </tr>
         
            <tr>
                <td>Category</td>
                <td>
                    <select name="category">
                    <?php
                        $sql="SELECT * FROM tbl_category WHERE active='yes'";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $category_title=$row['title'];
                                $category_id=$row['category_id'];   
                               //echo "<option value='category_id'>$category_title</option>";
                                ?>
                                <option <?php if($current_category==$category_id){ echo 'selected'; }?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<option value='0'>category not availabe</option>";
                        }
                    ?>       
                    </select>
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="number" name='quantity' value="<?php echo $quantity;?>"></td>
            </tr>
            <tr>
                <td>Featured</td>
                <td>
                    <input <?php if($featured=='yes'){echo "checked";}?> type="radio" name="featured" value="yes">Yes
                    <input <?php if($featured=='no'){echo "checked";}?> type="radio" name="featured" value="no">No
                </td>
            </tr>
            <tr>
                <td>Active</td>
                <td>
                    <input <?php if($active=='yes'){echo "checked";}?> type="radio" name="active" value="yes">Yes
                    <input <?php if($active=='no'){echo "checked";}?> type="radio" name="active" value="no">No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="update" class="fd-3">
                    
                </td>
            </tr>
            </table>
        </form>
<?php
if(isset($_POST['submit']))
{
    //echo 'clicked';
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $category=$_POST['category'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    $sql3="UPDATE tbl_food SET
        title='$title',
        description='$description',
        price=$price,
       
        category_id='$category',
        quantity='$quantity',
        featured='$featured',
        active='$active'
        WHERE food_id=$id
    ";
    $res3=mysqli_query($conn,$sql3);
    if($res3==TRUE)
    {
        $_SESSION['update']="<div class='sucess'>update sucessfull</div>";
        ?>
        
        <div id="popup" class="popup">
    <div class="popup-content">
        <h2>!! Update successfull !!</h2>
        <br>
        <p>Your update hade been made</p>
        <br>
        <button id="close-popup">Back to Foods</button>
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
    }
    else
    {
        $_SESSION['update']="<div class='error'>update failed</div>";
        ?>
        <script>
            window.location.href="<?php echo SITEURL ;?>admin/manage-food.php";
        </script>
        <?php
        exit;
    }
}
?>
    </div>
</div>
<?php include('partial/footer.php');?>