<?php

    //include constants
    include('../config/constants.php');

    //get ID to be deleted
    $id= $_GET['id'];

    //sql query
    $sql= "DELETE FROM admin_table where id=$id";

    //execute
    $res = mysqli_query($conn, $sql);

    //check
    if($res==TRUE)
    {
        //Query success
        //echo "Admin Deleted!";
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
        //redirect
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //echo "Failed to delete!";

        $_SESSION['delete']= "<div class='error'>Failed to delete admin. Try again!</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //redirect
?>