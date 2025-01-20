<?php
include '../products/connect.php';
session_start();

if (isset($_POST['order_cancel'])) {
    $order_id = $_POST['order_id'];
    //echo $order_id;
    $remove_query="delete from orders where Order_ID='$order_id'";
    $remove_result=mysqli_query($conn,$remove_query) or die('remove query failed');
    header('location:useraccount.php?alert=deleted');
}

if (isset($_POST['r_submit'])) {
    $r_name = $_POST['r_name'];
    $r_saying = $_POST['r_saying'];
    $r_img_name = $_FILES['r_image']['name'];
    $r_img_tmp_name = $_FILES['r_image']['tmp_name'];
    $r_img_folder = 'img/' . $r_img_name;
    $r_status = 'Active';

    // Move the uploaded file to the desired location
    if (move_uploaded_file($r_img_tmp_name, $r_img_folder)) {
        // File uploaded successfully, proceed with database insertion
        $r_query = "INSERT INTO reviews (U_name, U_Saying, U_Image, R_Status) VALUES ('$r_name', '$r_saying', '$r_img_name', '$r_status')";
        $r_result = mysqli_query($conn, $r_query);
        if ($r_result) {
            // Redirect to useraccount.php with success alert
            header('location:useraccount.php?alert=reviewed');
            exit(); // Ensure script stops execution after redirect
        } else {
            // Handle the case where the query execution failed
            echo "Review submission failed";
        }
    } else {
        // Handle the case where file upload failed
        echo "File upload failed";
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


    <title> <?php
                       if (isset($_SESSION['username'])){
                       echo $_SESSION['username'];
                       } else {
                       echo "User";
                       }
                       ?></title>

</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-user bx-md'></i>
            <span class="text">My Account</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bx-fade-right-hover bxs-dashboard'></i>
                    <span class="text">My Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../shop.php">
                    <i class='bx bx-fade-left bxs-left-arrow-circle'></i>
                    <span class="text">Back to Shopping</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../includes/logout.php" class="logout">
                    <i class='bx bx-fade-left bxs-log-out-circle'></i>
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
                       if (isset($_SESSION['username'])){
                       echo $_SESSION['username'] . ' !';
                       } else {
                       echo "User !";
                       }
                       ?></h1>
                    <hr>
                    <div class="user-card-main">
                        <div class="user-card-contennt">
                            <div class="user-main-title">
                                <div class="my-orders-card">
                                    <div class="my-orders-title">
                                        <h2>My Orders</h2>
                                    </div>
                                    <div class="my-orders-content">
                                        <?php
                                            $my_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE `Order_User` = '$_SESSION[useruid]'");
                                            if(mysqli_num_rows($my_orders) > 0){
                                               echo '<table>
                                                       <thead>
                                                          <tr>
                                                             <th>Order ID</th>
                                                             <th>Order Status</th>
                                                             <th>Order Content</th>
                                                             <th>Grand Total</th>
                                                             <th>Delivery Fees</th>
                                                             <th>Action</th>
                                                          </tr>
                                                        </thead>
                                               <tbody>'; // Start tbody here
                                            while($row = mysqli_fetch_assoc($my_orders)){         
                                        ?>
                                        <tr>
                                            <td>ODR-<?php echo $row['Order_ID'] ?></td>
                                            <td><?php echo $row['Order_Status'] ?></td>
                                            <td><?php echo $row['Order_Content'] ?></td>
                                            <td>$<?php echo $row['Grand_Total'] ?></td>
                                            <td>$<?php echo $row['Delivery_Fee'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="order_id"
                                                        value="<?php echo $row['Order_ID'] ?>">
                                                    <?php
                                                        if($row['Order_Status'] == 'Delivered'){
                                                            echo '<p class="order-done">Done</p>';
                                                        } else {
                                                            echo '<input type="submit" name="order_cancel" value="Cancel Order" class="order-cancel">';
                                                        }
                                                        ?>
                                                    <!--<input type="submit" name="order_cancel" value="Cancel Order"
                                                        class="order-cancel">-->
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                         }
                                           echo '</tbody></table>'; // End tbody here
                                           } else {
                                               echo "No Orders Available";
                                           }
                                        ?>
                                    </div>
                                </div>
                                <div class="rating-box">
                                    <div class="rating">
                                        <h3 class="my-review">Add My Review</h3>
                                        <form method="post" enctype="multipart/form-data" class="review-form">
                                            <input class="form-inputs" placeholder="Your Image Upload Here" type="file"
                                                name="r_image" accept="image/jpeg, image/png" required>
                                            <input class="form-inputs" type="text" name="r_name" placeholder="Your Name"
                                                required>
                                            <!--<input type="text" name="r_saying" placeholder="Your Saying" required>-->
                                            <textarea class="form-textarea" name="r_saying" id="r_saying"
                                                placeholder="Your Saying" required></textarea>
                                            <button type="submit" name="r_submit" class="review-btn">Add Review</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
    </section>
    <script src="../assets/js/admin.js"></script>
</body>

</html>