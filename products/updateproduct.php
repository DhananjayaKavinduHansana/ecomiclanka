<?php
include 'connect.php';
//update product
if(isset($_POST['update_product'])){
    $edit_id=$_POST['update_product_id'];
    $update_product_name=$_POST['update_product_name'];
    $update_product_price=$_POST['update_product_price'];
    $update_product_stoke=$_POST['update_product_stoke'];
    $update_product_image=$_FILES['update_product_image']['name'];
    $update_product_image_tmp=$_FILES['update_product_image']['tmp_name'];
    move_uploaded_file($update_product_image_tmp,"./images/$update_product_image");
    $update_product_query=mysqli_query($conn,"UPDATE `products` SET `P_Name`='$update_product_name',`P_Price`='$update_product_price',`P_Stoke`='$update_product_stoke',`P_Image`='$update_product_image' WHERE `P_ID`='$edit_id'");
    if($update_product_query){
        echo "<script>alert('Product Updated Successfully')</script>";
        echo "<script>window.location.href='viewproduct.php'</script>";
    }
    else{
        echo "<script>alert('Product Not Updated Successfully')</script>";
        echo "<script>window.location.href='viewproduct.php'</script>";
    }
}

//update offer
if(isset($_POST['update_offer'])){
    $edit_offer_id=$_POST['update_offer_id'];
    $update_offer_name=$_POST['update_offer_name'];
    $update_offer_price=$_POST['update_offer_price'];
    $update_offer_description=$_POST['update_offer_description'];
    $update_offer_image=$_FILES['update_offer_image']['name'];
    $update_offer_image_tmp=$_FILES['update_offer_image']['tmp_name'];
    move_uploaded_file($update_offer_image_tmp,"./images/$update_offer_image");
    $update_offer_query=mysqli_query($conn,"UPDATE `offers` SET `Offer_Name`='$update_offer_name',`Offer_Price`='$update_offer_price',`Offer_Description`='$update_offer_description',`Offer_Image`='$update_offer_image' WHERE `Offer_ID`='$edit_offer_id'");
    if($update_offer_query){
        echo "<script>alert('Offer Updated Successfully')</script>";
        echo "<script>window.location.href='viewproduct.php'</script>";
    }
    else{
        echo "<script>alert('Offer Not Updated Successfully')</script>";
        echo "<script>window.location.href='viewproduct.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">

    <title>Update Product</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-shopping-bag-alt'></i>
            <span class="text">Update News</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="../users/superadmin.php">
                    <i class='bx bx-fade-left bxs-left-arrow-circle'></i>
                    <span class="text">Back to Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="./viewproduct.php">
                    <i class='bx bx-fade-left bxs-left-arrow-circle'></i>
                    <span class="text">Back to Products</span>
                </a>
            </li>
            <li class="active">
                <a href="viewoffers.php">
                    <i class='bx bx-fade-left bxs-left-arrow-circle'></i>
                    <span class="text">Back to Offers</span>
                </a>
            </li>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Update Product</h1>
                    <hr>
                    <div class="add-product">
                        <?php
                        if(isset($_GET['edit'])){
                            $edit_id=$_GET['edit'];
                            $edit_query=mysqli_query($conn,"SELECT * FROM `Products` WHERE `P_ID`='$edit_id'");
                            if(mysqli_num_rows($edit_query)>0){
                               while($fetch_data=mysqli_fetch_assoc($edit_query)){
                                    $row=$fetch_data['P_ID'];
                                    $row=$fetch_data['P_Name'];
                                    $row=$fetch_data['P_Unit'];
                                    $row=$fetch_data['P_Image'];
                                ?>
                        <form action="" method="post" enctype="multipart/form-data"
                            class="update_product product_container_box">
                            <ul>
                                <img src="./images/<?php print $fetch_data['P_Image']?>" alt="" width="300px"
                                    height="300px">
                                <input type="hidden" value="<?php print $fetch_data['P_ID']?>" name="update_product_id">
                                Product Name<input type="text" placeholder="<?php print $fetch_data['P_Name']?>"
                                    name="update_product_name" required>
                                Product Unit<input type="price" placeholder="<?php print $fetch_data['P_Unit']?>"
                                    name="update_product_price" required>
                                Product Image<input type="File" name="update_product_image" required
                                    accept="image/jpg, image/jpeg, /image/png"><br><br>
                                <input type="submit" class="update-btn" value="Update Product" name="update_product"
                                    required>
                                <input type="reset" class="cancel-btn" id="close-edit" value="Cancel">
                                <!--<a href="" class="update-btn" value="Update_Product" name="update_product"
                                    required>UpdateProduct</a>
                                <a href="./viewproduct.php" class="cancel-btn" type="reset" value="cansel">Cancel</a>-->
                                <!--<button class="btn btn-danger" type=reset" value="cancel"><a
                                        href="./viewproduct.php">Cancel</a></button>-->
                            </ul>
                        </form>

                        <?php
                        }
                            }


                        }    
                        ?>


                    </div>
                    <br>
                    <h1>Update News</h1>
                    <hr>
                    <div class="add-product">
                        <?php
                        if(isset($_GET['edit'])){
                            $edit_offer_id=$_GET['edit'];
                            $edit_offer_query=mysqli_query($conn,"SELECT * FROM `News` WHERE `N_ID`='$edit_id'");
                            if(mysqli_num_rows($edit_offer_query)>0){
                               while($fetch_data=mysqli_fetch_assoc($edit_offer_query)){
                                    $row=$fetch_data['N_ID'];
                                    $row=$fetch_data['N_Title'];
                                    $row=$fetch_data['N_Body'];
                                    $row=$fetch_data['N_Status'];
                                ?>
                        <form action="" method="post" enctype="multipart/form-data"
                            class="update_product product_container_box">
                            <ul>
                                <img src="./images/<?php print $fetch_data['N_Title']?>" alt="" width="300px"
                                    height="300px">
                                <input type="hidden" value="<?php print $fetch_data['N_ID']?>"
                                    name="update_offer_id">
                                News Title<input type="text" placeholder="<?php print $fetch_data['N_Body']?>"
                                    name="update_offer_name" required>
                                News Status<input type="price" placeholder="<?php print $fetch_data['N_Status']?>"
                                    name="update_offer_price" required>
                                News Image<input type="File" name="update_offer_image" required
                                    accept="image/jpg, image/jpeg, /image/png"><br><br>
                                <input type="submit" class="update-btn" value="Update Offer" name="update_offer"
                                    required>
                                <input type="reset" class="cancel-btn" id="close-edit" value="Cancel">
                                <!--<a href="" class="update-btn" value="Update_Product" name="update_product"
                                    required>UpdateProduct</a>
                                <a href="./viewproduct.php" class="cancel-btn" type="reset" value="cansel">Cancel</a>-->
                                <!--<button class="btn btn-danger" type=reset" value="cancel"><a
                                        href="./viewproduct.php">Cancel</a></button>-->
                            </ul>
                        </form>

                        <?php
                        }
                            }


                        }    
                        ?>


                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src="../assets/js/admin.js"></script>
</body>

</html>