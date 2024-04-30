<?php include('partials/menu.php');?>
   <!--Menu Selection/Edit  -->
        <div class="main-content">
            <div class="wrapper">
                    <h1>Manage Admin</h1>
            <br />
            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset ($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }
            ?>
            <br />
            <br />
            <br />


            <!--- Add admin button -->
            <a href="add-admin.php" class="btn-primary">Add Admin </a>

            <br />
            <br />
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //Query to get all infos
                    $sql = "SELECT * FROM admin_table";
                    //execute
                    $res = mysqli_query($conn, $sql);

                    //check
                    if($res==TRUE)
                    {
                        //count rows
                        $count = mysqli_num_rows($res); 
                        $sn=1;

                            if($count>0)
                            {
                                //have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //while loop

                                    //idiv. data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //display
                                    ?>
                                     <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //no data in database
                            }
                    }
                ?>


                
            </table>

        </div>
    </div>
<?php include('partials/footer.php');?>

