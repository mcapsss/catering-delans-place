<?php include('partials/menu.php');?>
   <!--Menu Selection/Edit  -->
        <div class="main-content">
            <div class="wrapper">
                    <h1>Manage Sets</h1>
                    <br />
            <br />

            <!--- Add admin button -->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Set</a>

            <br /><br /><br />

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

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);

                }

                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);

                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);

                }

            ?>


            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //Create a SQL query to get all the food
                    $sql = "SELECT * FROM food_table";

                    //Execute the query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows to check whether we have foods or not
                    $count = mysqli_num_rows($res);

                    //Create Serial Number Variable and Set Default Value as 1
                    $sn=1;

                    if($count>0)
                    {
                        //We have food in Database
                        //Get the food from Database and Display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the values from individual columns
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>

                            <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $title; ?></td>
                            <td>₱<?php echo $price; ?></td>
                            <td>
                                <?php 
                                    //Check whether we have image or not
                                    if($image_name=="")
                                    {
                                        //We do not have image, Display error message
                                        echo "<div class='error'>Image not Added.</div>";
                                    }
                                    else
                                    {
                                        //We have Image, Display it
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>;
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                            </td>
                             <tr>

                            <?php
                        }
                    }
                    else
                    {
                        //Food not Added in Database
                        echo "<tr> <td colspan='7'class='error'> Food not Added Yet.</td> </tr>";
                    }

                ?>
                
                  
            </table>
              
        </div>
        </div>
<?php include('partials/footer.php');?>