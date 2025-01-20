<?php

$conn=mysqli_connect("localhost","root","root","ecomic_lanka") or die("Connection Failed");
if(isset($_POST['add_product'])){
    $product_name=$_POST['product_name'];
    $product_category=$_POST['product_category'];
    $product_unit=$_POST['product_unit'];
    $product_image=$_FILES['product_image']['name'];
    $product_image_tmp_name=$_FILES['product_image']['tmp_name'];
    $product_image_folder='./images/'.$product_image;
    $query="INSERT INTO Products(P_Name,P_Type,P_Unit,P_Image) VALUES('$product_name','$product_category','$product_unit','$product_image')";
    $result=mysqli_query($conn,$query);
    if($result){
        move_uploaded_file($product_image_tmp_name,$product_image_folder);
        echo "<script>window.alert('Product Added Successfully')</script>";
        //header('location:addproduct.php');
    }else{
        echo "<script>window.alert('Product Not Added')</script>";
        //header('location:addproduct.php');
    }
}

if(isset($_POST['add_news'])){
    $news_title=$_POST['news_name'];
    $news_description=$_POST['news_description'];
    $news_image=$_FILES['news_image']['name'];
    $news_image_tmp_name=$_FILES['news_image']['tmp_name'];
    $news_image_folder='./images/'.$news_image;
    $news_status='New';
    $query="INSERT INTO News(N_Title, N_Body, N_Image, N_Status) VALUES('$news_title','$news_description', '$news_image', '$news_status')";
    $result=mysqli_query($conn,$query);
    if($result){
        move_uploaded_file($news_image_tmp_name,$news_image_folder);
        echo "<script>window.alert('News Added Successfully')</script>";
    }else{
        echo "<script>window.alert('Can't Add News')</script>";
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
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Add Products</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-shopping-bag-alt bx-tada bx-md'></i>
            <span class="text">Add Produts</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="../users/superadmin.php">
                    <i class='bx bx-fade-left bxs-left-arrow-circle '></i>
                    <span class="text">Back to Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="viewproduct.php">
                    <i class='bx bxs-shopping-bag bx-tada '></i>
                    <span class="text">Added Products</span>
                </a>
            </li>
        </ul>
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
                    <h1>Add Products</h1>
                    <hr>
                    <div class="product-card">
                        <div class="add-product">
                            <form action="" method="post" enctype="multipart/form-data">
                                <h3>Add News</h3>
                                <ul>
                                    News Title<input type="text" placeholder="News Title" name="news_name"
                                        required><br>
                                    News Description<input type="text" placeholder="News Description"
                                        name="news_description" required>
                                    News Image<input type="File" placeholder="News Image" name="news_image" required
                                        accept="image/jpg, image/jpeg, /image/png"><br><br>
                                    <button class="form-button" value="AddNews" name="add_news">Add
                                        News</button>
                                </ul>
                            </form>
                        </div>
                        <div class="add-product">
                            <form action="" method="post" enctype="multipart/form-data">
                                <h3>Add Products</h3>
                                <ul>
                                    Product Name<input type="text" placeholder="Product Name" name="product_name"
                                        required><br>
                                    Product Category <label class="form-label">
                                        <select class="form-options" name="product_category" id="">
                                            <option value="">Select Category</option>
                                            <option value="Vegitable">Vegitables</option>
                                            <option value="Fruit">Fruits</option>
                                        </select>
                                    </label><br>
                                    Product Unit<label class="form-label">
                                        <select class="form-options" name="product_unit" id="">
                                            <option value="">Select Category</option>
                                            <option value="Kg">Kg</option>
                                            <option value="g">g</option>
                                        </select>
                                    </label><br>
                                    Product Image<input type="File" placeholder="Product Image" name="product_image"
                                        required accept="image/jpg, image/jpeg, /image/png"><br><br>
                                    <button class="form-button" value="AddProduct" name="add_product">Add
                                        Product</button>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src="../assets/js/admin.js"></script>
</body>

</html>