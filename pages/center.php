<?php
include '../products/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prices Updates</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/center.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/slider.css">
</head>

<body>
    <header>
        <div class="nav-body">
            <div class="navigation">
                <ul>
                    <li class="list">
                        <a href="../index.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="text">Home</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list active">
                        <a href="#price">
                            <span class="icon">
                                <ion-icon name="cash-outline"></ion-icon>
                            </span>
                            <span class="text">Price</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="news.php">
                            <span class="icon">
                                <ion-icon name="newspaper-outline"></ion-icon>
                            </span>
                            <span class="text">News</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#contact">
                            <span class="icon">
                                <ion-icon name="call-outline"></ion-icon>
                            </span>
                            <span class="text">Contact</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../logins/userlogin.php">
                            <span class="icon">
                                <ion-icon name="person-outline"></ion-icon>
                            </span>
                            <span class="text">Profile</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <div class="indicator"></div>
                </ul>
            </div>
        </div>
    </header>
    <div class="center-container" id="price">
        <h2>Find Prices Here</h2>
        <p>You can slect date if you want and know about the prices</p>
        <div class="filter-container">
            <h3>Filter by Date and Location</h3>
            <form class="date-filter-form" method="POST">
                <input type="date" id="start-date" name="user_date" required>

                <div class="center-location">
                    <select name="center_location" required>
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

                <button type="submit" class="filter-button" name="submit_date">Filter</button>
            </form>
        </div>
        <div class="center-tables">
            <div class="table-container">
                <table class="styled-table">
                    <?php
                    // Check if form is submitted
                    if (isset($_POST['submit_date'])) {
                        $date = $_POST['user_date'];
                        $center = $_POST['center_location'];

                        // Sanitize inputs
                        $date = mysqli_real_escape_string($conn, $date);
                        $center = mysqli_real_escape_string($conn, $center);

                        // Query to get data based on selected date and center location
                        $select_date = mysqli_query($conn, "SELECT Prices.P_Date, Products.P_Name, Prices.P_Per_Unit 
                                            FROM Prices
                                            INNER JOIN Products ON Products.P_ID = Prices.V_ID
                                            WHERE Prices.P_Date = '$date' AND Prices.C_ID = '$center'");

                        // Check if records exist
                        if (mysqli_num_rows($select_date) > 0) {
                            echo '
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Date</th>
                    <th>Vegetable</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>';

                            $num = 1;
                            // Fetch and display each row of data
                            while ($fetch_date_details = mysqli_fetch_assoc($select_date)) {
                                echo '
                <tr>
                    <td>' . $num . '</td>
                    <td>' . htmlspecialchars($fetch_date_details['P_Date']) . '</td>
                    <td>' . htmlspecialchars($fetch_date_details['P_Name']) . '</td>
                    <td>' . htmlspecialchars($fetch_date_details['P_Per_Unit']) . '</td>
                </tr>';
                                $num++;
                            }
                            echo '</tbody>';
                        } else {
                            echo "<h4>No data found for the selected date and center location.</h4>";
                        }
                    } else {
                        echo "<h4>Select a date and center location to filter data.</h4>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="contact-section" id="contact">
        <h1>Contact US</h1>
        <ul>
            <li class="call"><a href="tel:0765809701">Call Us</a></li>
            <li class="call"><a href="mailto:dhanuhansana075@gmail.com">Mail Us</a></li>
            <li class="call"><a href="https://maps.app.goo.gl/2ZpTG3CbzMx45UxB6">Visit Us</a></li>
        </ul>
        <div class="social-section">
            <a href="https://www.facebook.com/dhanu.hansana.5"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/DhananjayaKavi3?t=y0HDSnMApj-YbeomIl1aNw&s=09"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com/dhanu_kavi_2k21?utm_medium=copy_link"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/dhananjaya-kavindu-a9644a215"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Linking custom script -->
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../JS/main.js"></script>
</body>

</html>