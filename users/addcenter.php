<?php

//connect to databse
include '../products/connect.php';



if (isset($_POST['register'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $center_location = $_POST['center_location'];

    // Insert data into the database
    $insert_query = "INSERT INTO `Centers` (`C_Name`, `C_Location`, `C_Email`, `C_Contact`) 
        VALUES ('$name', '$center_location', '$email', '$phone')";

    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Center registered successfully')</script>";
        // Redirect to a success page or any other desired location
        echo "<script>window.location = 'addcenter.php'</script>";
    } else {
        echo "<script>alert('Failed to register user')</script>";
    }
}


// Ban centers
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    $remove_query = "delete from userdetails where C_ID='$remove_id'";
    if (mysqli_query($conn, $remove_query)) {
        header('location:addcenter.php?alert=deleted');
    } else {
        echo "<script>alert('Cannot Delete Center')</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <!--boostrap -->


    <title>Add Centers</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-user bx-tada bx-md'></i>
            <span class="text">Centers</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="../users/superadmin.php">
                    <i class='bx bx-fade-left bxs-left-arrow-circle '></i>
                    <span class="text">Back to Dashboard</span>
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
                    <h1>Centers</h1>
                    <hr>
                    <div class="tiles">
                        <ul class="cards">
                            <div class="admin-car-title">
                                Total Centers
                            </div>
                            <div class="admin-card-content">
                                <h1> <?php
                                        $select_product = mysqli_query($conn, "Select * from `Centers`");
                                        $row_count = mysqli_num_rows($select_product);
                                        echo $row_count;
                                        ?>
                                </h1>
                            </div>
                        </ul>
                    </div>

                    <div class="add-employee-crd">
                        <div class="add-employee-crd-title">
                            <h1>Add New Center</h1>
                            <hr>
                        </div>
                        <div class="cart-table-wrap">
                            <form class="input-group-admin-ad" method="POST">
                                <div class="input-group-admin-add">
                                    <input type="text" placeholder="Center Name" name="name" required>
                                    <input type="email" placeholder="Center Email" name="email" required>
                                    <input type="text" placeholder="Phone Number (07x-)" name="phone" maxlength="10" required>
                                    <select name="center_location" id="">
                                        <option value="">Select Center Location</option>
                                        <option value="Keppetipola">Keppetipola</option>
                                        <option value="Bandarawela">Bandarawela</option>
                                        <option value="Dambulla">Dambulla</option>
                                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                                        <option value="Veyangoda">Veyangoda</option>
                                        <option value="Bokundara">Bokundara</option>
                                        <option value="Welisara">Welisara</option>
                                    </select>
                                </div>
                                <button type="submit" name="register" class="add-emp-form-btn">Register</button><br>
                            </form>

                        </div>
                    </div>
                    <div class="user-details-card">
                        <div class="order-assign-card-title">
                            <h1>Center Details</h1>
                            <hr>
                        </div>
                        <din class="user-dt">
                            <div class="cart-table-wrap">
                                <table>
                                    <?php
                                    $select_center = mysqli_query($conn, "Select * from `Centers`");
                                    $num = 1;
                                    if (mysqli_num_rows($select_center) > 0) {
                                        echo '
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Center Name</th>
                                        <th>Mobile Number</th>
                                        <th>Center Location</th>
                                        <th>Disable Center</th>
                                    </tr>
                                </thead>';
                                        while ($fetch_center_details = mysqli_fetch_assoc($select_center)) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $num ?></td>
                                                    <td>
                                                        <?php echo $fetch_center_details['C_Name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fetch_center_details['C_Contact'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fetch_center_details['C_Location'] ?>
                                                    </td>
                                                    <td><a
                                                            href="addcenters.php?remove=<?php echo $fetch_Centers['C_ID'] ?>"><i
                                                                class="bx bxs-trash"></i></a></td>
                                                </tr>
                                        <?php
                                            $num++;
                                        }
                                    } else {
                                        echo "<h4>No Centers</h4>";
                                    }

                                        ?>
                                            </tbody>
                                </table>
                            </div>
                        </din>
                    </div>
                </div>
            </div>
            </div>
        </main>
    </section>
    <script src="../assets/js/admin.js"></script>
</body>

</html>