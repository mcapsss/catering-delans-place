<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br />
        <br />
        <?php
            //get ID
            $id = $_GET['id'];

            //create sql query
            $sql = "SELECT * FROM admin_table WHERE id=$id";

            //execute
            $res=mysqli_query($conn, $sql);

            //check
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                //check
                if($count==1)
                {
                    //get details
                    $row = mysqli_fetch_assoc($res);

                    $full_name =$row['full_name'];
                    $username =$row['username'];
                }
                else
                {
                    //redirect
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
            


        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"> 
                </td>
             </tr>

                <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $username; ?>"> 
                </td>
             </tr>

             <tr>
                 <td colspan="2">
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                     <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td>
            </tr>

            </table>
        </form>
    </div>
</div>

<?php

    //to check if submit button is clicked
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //sql query
        $sql = "UPDATE admin_table SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

        //execute query
        $res = mysqli_query($conn, $sql);

        //check
        if($res==TRUE)
        {
            //query executed
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to update admin
            $_SESSION['update'] = "<div class='error'>Failed to Upate Admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

?>


<?php include('partials/footer.php'); ?>