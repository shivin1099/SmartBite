<?php include('partial/menu.php');?>
<div class="body">
    <div class="wrapper">
        <h1 class="white text-center">Add Food</h1>
        <br>
        <br>
        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }



    
        $sql="SELECT * FROM tbl_category WHERE active='yes'";
        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);
       
        ?>
        <section class="food-search color">
        <div class="container ">
            <form action="" method="POST" enctype="multipart/form-data" class="order">
                
                <fieldset>
                    <legend class=" white"> Food  Details</legend>
                    <div class="order-label white">Title</div>
                    <input type="text" name="title" placeholder="  Enter food Title" class="input-responsive" >

                    <div class="order-label white">Description</div>
                    <textarea name="description" rows="5" placeholder="  Enter Description" class="input-responsive" ></textarea>
                    <div class="order-label white">Price</div>
                    <input type="number" name="price"  class="input-responsive" >
                    <div class="order-label white">Upload image </div>
                    <input type="file" name="image"  class=" white" >
                    <br><br>
                    <div class="order-label white">Quantity</div>
                    <input type="number" name="quantity"  class="input-responsive" >
                    <div class="order-label white">Category</div>
                    <select class="input-responsive" name="category" id="">

<?php
                    if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $id=$row['category_id'];
                $title=$row['title'];
                ?><option value="<?php echo $id;?>"><?php echo $title;?></option> <?php
            }
        }
?>
                              
                    </select>
                    <div class="order-label white">Featured</div>
                    <p class="white">
                        <input  class="white" type="radio" name="featured" value="yes">Yes
                        <input  type="radio" name="featured" value="no">No
                    </p>
                    
                    <div class="order-label white">Active</div>
                    <p class="white">
                        <input  type="radio" name="active" value="yes">Yes
                        <input  type="radio" name="active" value="no">No
                    </p>
                    <br>
                    

                    <input type="submit" name="submit" value="Add Food" class="btn fd-3">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $quantity=$_POST['quantity'];
                $category=$_POST['category'];
                
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else
                {
                    $featured='no';
                }

                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active='no';
                }

                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];
                    if($image_name!='')
                    {
                        $end=explode('.',$image_name);
                        $ext=end($end);
                        $image_name="food-name-".rand(0000,9999).".".$ext;
                        $src=$_FILES['image']['tmp_name'];

                        $dst="../images/food/".$image_name;

                        $upload=move_uploaded_file($src,$dst);
                        if ($upload==FALSE)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to upload</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }
                    }
                
                }
                else
                {
                    $image_name='';
                }




                $sql2="INSERT INTO tbl_food SET
                    title='$title',
                    description='$description',
                    price=$price,
                    image_name='$image_name',
                    category_id='$category',
                    quantity='$quantity',
                    featured='$featured',
                    active='$active'
                ";

                $res2=mysqli_query($conn,$sql2);


                if($res==TRUE)
                {
                    $_SESSION['add']="<div class='sucess'>food added sucessfully</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['add']="<div class='error'>failed to add food</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');

                }
            }
            ?>
        </div>
    </section>
        </div>
</div>    
<?php include('partial/footer.php');?>