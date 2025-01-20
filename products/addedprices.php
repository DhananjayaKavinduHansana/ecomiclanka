<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/product.css">
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-shopping-bag-alt bx-tada bx-md'></i>
            <span class="text">Added Produts</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="../users/superadmin.php">
                    <i class='bx bx-fade-left bxs-left-arrow-circle'></i>
                    <span class="text">Back to Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="viewoffers.php">
                    <i class='bx bxs-shopping-bag bx-tada'></i>
                    <span class="text">Added News</span>
                </a>
            </li>
            <li class="active">
                <a href="addProduct.php">
                    <i class='bx bxs-shopping-bag bx-tada'></i>
                    <span class="text">Add Products</span>
                </a>
            </li>
        </ul>
    </section>




    <!-- SIDEBAR -->
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
                    <h1>Added Products</h1>
                    <hr>
                    <div class="product-container">
                        <div class="body">
                            <?php
                            $display_product = mysqli_query($conn, "SELECT * FROM `Products`");
                            if (mysqli_num_rows($display_product) > 0) {
                                //logic to fetch data from db
                                while ($row = mysqli_fetch_assoc($display_product)) {
                            ?>
                                    <div class="product">
                                        <div class="iamge">
                                            <img src="images/<?php print $row['P_Image'] ?>" alt="" width="150px"
                                                height="150px"" alt="">
                                   </div>
                                   <div class=" product-info">
                                            <h3><?php print $row['P_Name'] ?></h3>
                                            <h4><?php print $row['P_Type'] ?> </h4>
                                            <h4>Selling Unit - <?php print $row['P_Unit'] ?> </h4>
                                            <div class="card-buttons">
                                                <a href="updateproduct.php?edit=<?php print $row['P_ID'] ?>"
                                                    class="edit-btn">Edit</a>
                                                <a href="deleteproduct.php?delete=<?php print $row['P_ID'] ?>" class="delete-btn"
                                                    onclick="return confirm('Are You Sure You Want To Delete This Product ?');">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                print "No Products Available";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src="../assets/js/admin.js"></script>
</body>

</html>