<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }

    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Event Categories</h2>

            <?php 
                //create sql query to display catergories from database
                $sql=  "SELECT * FROM menu_table WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the query
                $res= mysqli_query($conn, $sql);
                // count rows to check whether he catergory is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the value like title, image name and id
                        $id = $row[ 'id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                         <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id ?>">
                          <div class="box-3 float-container">
                            <?php
                            // check image
                                if($image_name=="")
                                //message not avail
                                {
                                echo "<div class='error'>Image not Available</div>";
                                }
                                else{
                                    //image avail
                                    ?>
                                      <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                              <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                 </div>
                                 </a>
                        <?php
                    }
                }
                else{
                    //catergories not available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>

         
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here --> 

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Sets</h2>

            <?php

            //getting food from data base
            //sql query
            $sql2="SELECT * FROM food_table WHERE active='Yes' AND featured='Yes' LIMIT 6";
            //execute the query
            $res2=mysqli_query($conn, $sql2);

            //count rows
            $count2= mysqli_num_rows($res2);

            //check availability
            if($count2>0){
                //food available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //get values
                    $id = $row[ 'id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];
                    ?>
                    <div class="food-menu-box">
                      <div class="food-menu-img">
                      <?php
                        //check image available
                            if($image_name=="")
                            {
                                //image not avail
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                //image avail
                                ?>
                                  <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                      ?>
                       
                      </div>

                       <div class="food-menu-desc">
                        <h4><?php echo $title;?></h4>
                        <p class="food-price">₱<?php echo $price;?></p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                    <?php
                }
            }
            else{
                //not available
                echo "<div class='error'>Food not available.</div>";
            }
            ?>

           


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See all sets</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

 <?php include('partials-front/footer.php');?>