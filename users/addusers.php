<?php

//connect to databse
include '../products/connect.php';



if (isset($_POST['register'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $phone = $_POST['phone'];
    $user_center = $_POST['user_center'];
    $userpwd = $_POST['password'];
    $userpwdRepeat = $_POST['passwordRepeat'];

    // Check if passwords match
    if ($userpwd != $userpwdRepeat) {
        echo "<script>alert('Passwords do not match')</script>";
        exit(); // Stop further execution
    }

    // Hash the password for security
    $hashed_password = password_hash($userpwd, PASSWORD_DEFAULT);

    // Insert data into the database
    $insert_query = "INSERT INTO `Users` (`U_Name`, `UserName`, `U_Type`, `U_Email`, `U_Mobile`, `U_Password` , `U_Center`) 
                    VALUES ('$name', '$username', '$user_type', '$email', '$phone', '$hashed_password', '$user_center')";

    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('User registered successfully')</script>";
        // Redirect to a success page or any other desired location
        echo "<script>window.location = 'addusers.php'</script>";
    } else {
        echo "<script>alert('Failed to register user')</script>";
    }
}


// Ban users
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    $remove_query = "delete from userdetails where UserID='$remove_id'";
    if (mysqli_query($conn, $remove_query)) {
        header('location:addusers.php?alert=deleted');
    } else {
        echo "<script>alert('Cannot Delete user')</script>";
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


    <title>Add Users</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-user bx-tada bx-md'></i>
            <span class="text">Users</span>
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
                    <h1>Users</h1>
                    <hr>
                    <div class="tiles">
                        <ul class="cards">
                            <div class="admin-car-title">
                                Total Users
                            </div>
                            <div class="admin-card-content">
                                <h1> <?php
                                        $select_product = mysqli_query($conn, "Select * from `Users`");
                                        $row_count = mysqli_num_rows($select_product);
                                        echo $row_count;
                                        ?>
                                </h1>
                            </div>
                        </ul>
                    </div>

                    <div class="add-employee-crd">
                        <div class="add-employee-crd-title">
                            <h1>Add New Center Admins</h1>
                            <hr>
                        </div>
                        <div class="cart-table-wrap">
                            <form class="input-group-admin-ad" method="POST">
                                <div class="input-group-admin-add">
                                    <input type="text" placeholder="Name" name="name" required>
                                    <input type="text" placeholder="Username" name="username" required>
                                    <input type="email" placeholder="Email" name="email" required>
                                    <select name="user_type" id="">
                                        <option value="">Select User Type</option>
                                        <option value="SuperAdmin">Super Admin</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                    <input type="text" placeholder="Phone Number (07x-)" name="phone" maxlength="10" required>
                                    <select name="user_center" id="">
                                        <option value="">Select User Center</option>
                                        <option value="1">Keppetipola</option>
                                        <option value="2">Bandarawela</option>
                                        <option value="3">Dambulla</option>
                                        <option value="4">Nuwara Eliya</option>
                                        <option value="5">Veyangoda</option>
                                        <option value="6">Bokundara</option>
                                        <option value="7">Welisara</option>
                                    </select>
                                    <input type="password" placeholder="Password" name="password" maxlength="8" required>
                                    <input type="password" placeholder="Retype Password" name="passwordRepeat" maxlength="8" required>
                                </div>
                                <button type="submit" name="register" class="add-emp-form-btn">Register</button><br>
                            </form>

                        </div>
                    </div>
                    <div class="user-details-card">
                        <div class="order-assign-card-title">
                            <h1>Users Details</h1>
                            <hr>
                        </div>
                        <din class="user-dt">
                            <div class="cart-table-wrap">
                                <table>
                                    <?php
                                    $select_users = mysqli_query($conn, "Select * from `Users`");
                                    $num = 1;
                                    if (mysqli_num_rows($select_users) > 0) {
                                        echo '
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>User Name</th>
                                        <th>Mobile Number</th>
                                        <th>User Type</th>
                                        <th>Disable User</th>
                                    </tr>
                                </thead>';
                                        while ($fetch_user_details = mysqli_fetch_assoc($select_users)) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $num ?></td>
                                                    <td>
                                                        <?php echo $fetch_user_details['U_Name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fetch_user_details['U_Mobile'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fetch_user_details['U_Type'] ?>
                                                    </td>
                                                    <td><a
                                                            href="addusers.php?remove=<?php echo $fetch_Users['U_ID'] ?>"><i
                                                                class="bx bxs-trash"></i></a></td>
                                                </tr>
                                        <?php
                                            $num++;
                                        }
                                    } else {
                                        echo "<h4>No users</h4>";
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