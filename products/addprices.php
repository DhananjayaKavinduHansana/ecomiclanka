<?php

$conn = mysqli_connect("localhost", "root", "root", "ecomic_lanka") or die("Connection Failed");

if (isset($_POST['add_prices'])) {
    $price_date = $_POST['price_date'];
    $price_unit_price = $_POST['price'];
    $vegetable = $_POST['v_id'];
    $center = $_POST['c_id'];


    // Insert data into the database
    $insert_query = "INSERT INTO `Prices` (`P_Date`, `P_Per_Unit`, `V_ID`, `C_ID`) 
        VALUES ('$price_date', '$price_unit_price', '$vegetable', '$center')";

    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Price Added successfully')</script>";
        // Redirect to a success page or any other desired location
        echo "<script>window.location = 'addprices.php'</script>";
    } else {
        echo "<script>alert('Failed to add price')</script>";
    }
}

if (isset($_POST['add_news'])) {
    $news_title = $_POST['news_name'];
    $news_description = $_POST['news_description'];
    $news_image = $_FILES['news_image']['name'];
    $news_image_tmp_name = $_FILES['news_image']['tmp_name'];
    $news_image_folder = './images/' . $news_image;
    $news_status = 'New';
    $query = "INSERT INTO News(N_Title, N_Body, N_Image, N_Status) VALUES('$news_title','$news_description', '$news_image', '$news_status')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        move_uploaded_file($news_image_tmp_name, $news_image_folder);
        echo "<script>window.alert('News Added Successfully')</script>";
    } else {
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
                <a href="../users/admin.php">
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
                                <h3>Add Prices</h3>
                                <ul>
                                    <form class="date-filter-form" method="POST">
                                        Select Date <input type="date" id="start-date" name="price_date" required>
                                        Price Per Unit<input type="text" placeholder="(ex - 45.67) " name="price"
                                            required>
                                        <div class="center-location">
                                            <select name="v_id" required>
                                                <option value="">Select Vegetable</option>
                                                <option value="2">Lemon</option>
                                                <option value="3">Cabage</option>
                                                <option value="4">Brokali</option>
                                                <option value="5">Strawbery</option>
                                                <option value="6">Rasberry</option>
                                                <option value="7">Potato</option>
                                            </select>
                                        </div>

                                        <div class="center-location">
                                            <select name="c_id" required>
                                                <option value="">Select Center</option>
                                                <option value="2">Keppetipola</option>
                                                <option value="3">Bandarawela</option>
                                                <option value="4">Dambulla</option>
                                                <option value="5">Nuwara Eliya</option>
                                                <option value="6">Veyangoda</option>
                                                <option value="7">Bokundara</option>
                                                <option value="8">Welisara</option>
                                            </select>
                                        </div>
                                        <button class="form-button" value="AddProduct" name="add_prices">Add
                                            Prices</button>
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