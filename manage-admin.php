<?php include("partial/menu.php"); ?>
    <!-- body start-->

    <div class="body">
        <div class="wrapper">
            <h1 class="text-center white">admin</h1>
            <br>
            <br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);

                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);

                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);

                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                    

                }

                if(isset($_SESSION['password-mismatch']))
                {
                    echo $_SESSION['password-mismatch'];
                    unset($_SESSION['password-mismatch']);

                }

                
                
            ?>
            
            <br>
            <br>


            <a href="add-admin.php" class="btn-1">add admin</a>
            <br>
            <br>
            <table class="white tbl-full">
                <tr>
                    <th>Sl no</th>
                    <th>Full name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                    

                <?php
                    $sql = 'SELECT * FROM tbl_admin';
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
                                $id=$rows['admin_id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-pswd.php?id=<?php echo $id; ?>" class="btn-4">Change password</a>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-2">Update admin</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-3">Delete admin</a>
                                    </td>
                                </tr>


                                <?php
                            }
                        }
                        else
                        {

                        }
                    }
                    
                ?>

            </table>
            

            <div class="clearfix"></div>
        </div>
    </div>

<?php include("partial/footer.php"); ?>