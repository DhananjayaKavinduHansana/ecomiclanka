<?php
session_start();
include_once '../logins/dblogreg.php';

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
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
    <title>Super Admin Control</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-user bx-md'></i>
            <span class="text">Control Pannel</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bx-fade-right-hover bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../products/addProduct.php">
                    <i class='bx bx-fade-right-hover bxs-shopping-bag-alt'></i>
                    <span class="text">Add Product</span>
                </a>
            </li>
            <li>
                <a href="../products/viewproduct.php">
                    <i class='bx bx-fade-right-hover bxs-shopping-bag-alt'></i>
                    <span class="text">Added Products</span>
                </a>
            </li>
            <li>
                <a href="addusers.php">
                    <i class='bx bx-fade-right-hover bxs-user-circle'></i>
                    <span class="text">User Details</span>
                </a>
            </li>
            <li>
                <a href="addcenter.php">
                    <i class='bx bx-fade-right-hover bxs-user-circle'></i>
                    <span class="text">Centers Details</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../includes/logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
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
                    <h1>Welcome <?php
                                if (isset($_SESSION['useruid'])) {
                                    echo $_SESSION['U_Name'] . ' !';
                                } else {
                                    echo "User !";
                                }
                                ?></h1>
                    <hr>
                    <div class="main-tile">
                        <div class="tiles">
                            <ul class="cards">
                                <div class="admin-car-title">
                                    Total Users
                                </div>
                                <div class="admin-card-content">
                                    <h1>
                                        <?php
                                        $select_product = mysqli_query($conn, "Select * from `Users`");
                                        $row_count = mysqli_num_rows($select_product);
                                        echo $row_count;
                                        ?>
                                    </h1>
                                </div>
                            </ul>
                            <ul class="cards">
                                <div class="admin-car-title">
                                    Total Products
                                </div>
                                <div class="admin-card-content">
                                    <h1>
                                        <?php
                                        $select_product = mysqli_query($conn, "Select * from `Products`");
                                        $row_count = mysqli_num_rows($select_product);
                                        echo $row_count;
                                        ?>
                                    </h1>
                                </div>
                            </ul>
                            <ul class="cards">
                                <div class="admin-car-title">
                                    Total News
                                </div>
                                <div class="admin-card-content">
                                    <h1>
                                        <?php
                                        $select_offers = mysqli_query($conn, "Select * from `News`");
                                        $row_count = mysqli_num_rows($select_offers);
                                        echo $row_count;
                                        ?>
                                    </h1>
                                </div>
                            </ul>
                            </ul>
                            <ul class="cards">
                                <div class="admin-car-title">
                                    Total Centers
                                </div>
                                <div class="admin-card-content">
                                    <h1>
                                        <?php
                                        $select_offers = mysqli_query($conn, "Select * from `Centers`");
                                        $row_count = mysqli_num_rows($select_offers);
                                        echo $row_count;
                                        ?>
                                    </h1>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src="../assets/js/admin.js"></script>
</body>

</html>