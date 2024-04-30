<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title> Rico's Online Catering Service</title>
        <link rel="stylesheet" href="../css/admin.css">
</head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }

            ?>
            <br> <br>

            <!--Login Form Start-->
            <form action=""method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br><br>

            Password:<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!--Login Form End-->


            <p class="text-center">Created By - <a href="">TLC </a> </p>
        </div>

    </body>

    
</html>

<?php
    //check if submit is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for login 
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql check if user and pass exist
        $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";

        //execute query
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user not available
            $_SESSION['login'] = "<div class='error text-center'>Username or Password not found.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }


?>