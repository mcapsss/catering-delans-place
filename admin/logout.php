<?php
    include('../config/constants.php');
    //destroy SESSION
    session_destroy();
    //redirect
    header('location:'.SITEURL.'admin/login.php');
?>