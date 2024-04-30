<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
    <br />
    <br />
    <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
    ?>
    <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="enter full name"> </td>
            </tr>

            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" placeholder="enter username">
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" placeholder="enter password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>
</div>
</div>



<?php include('partials/footer.php');?>


<!-- Process the value -->
<?php 

    //Check if button is clicked
    if(isset($_POST['submit']))
    {
        // clicked
        // echo "Button clicked";

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password =md5($_POST['password']); //password encryption

        //SQL save to database

        $sql = "INSERT INTO admin_table SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
        //executing and saving into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //checking
        if($res==TRUE)
        {
            //echo "data inserted";
            $_SESSION['add']="Admin Added Successfully";
            //redirect page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //echo "data not inserted";
            $_SESSION['add']="Failed to Add";
            //redirect page
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>