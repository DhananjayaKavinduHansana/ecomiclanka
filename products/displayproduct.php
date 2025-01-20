<?php
include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product-section</title>
    <link rel="stylesheet" href="../assets/css/display.css">
</head>

<body>
    <div class="container">
        <div class="body">
            <?php
                    $display_product=mysqli_query($conn,"SELECT * FROM `products`");
                   if(mysqli_num_rows($display_product)>0){
                    //logic to fetch data from db
                         while($row=mysqli_fetch_assoc($display_product)){ 
                      ?>
            <div class="product">
                <div class="iamge">
                    <img src="images/<?php print $row['P_Image']?>" alt="" width="150px" height="150px"" alt="">
                </div>
                <div class=" product-info">
                    <h3><?php print $row['P_Name']?></h3>
                    <h4>Per Kg</span> $<?php print $row['P_Price']?> </h4>
                    <p class="info">
                        abcd
                    </p>
                    <a href="" class="addto_cart"><i class="fa fa-shopping-cart">Add to Cart</i></a>
                </div>
            </div>
            <?php
        }
        
    }else{
        print "No Products Available";
    }
    ?>
        </div>
    </div>
</body>

</html>