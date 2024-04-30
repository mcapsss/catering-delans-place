<?php 
    //constants
    include('../config/constants.php');

    //echo "Delete Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //delete process
        //echo "Process to Delete";

        //get ID and image name 
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove image
        if($image_name != "")
        {
            //get image path
            $path = "../images/food/".$image_name;

            //remove image file from folder
            $remove = unlink($path);

            //check if image is removed or not 
            if($remove==false)
            {
                //fail to remove
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
                //redirect
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process
                die();
            }
        }

        //delete food from database
        $sql = "DELETE FROM food_table WHERE id=$id";
        //execute query
        $res = mysqli_query($conn, $sql);
        //check
        //redirect to manage food with session
        if($res==true)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //failed to delete
            $_SESSION['delete'] = "<div class='error'>Failed to delete food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    

    }
    else
    {
        //redirect
        echo "Redirect";
        $_SESSION['unauthorize']="<div class='error'>Unauthorized Access</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }



?>