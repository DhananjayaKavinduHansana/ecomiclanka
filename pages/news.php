<?php
include '../products/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Updates</title>
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
                    <li class="list">
                        <a href="center.php">
                            <span class="icon">
                                <ion-icon name="cash-outline"></ion-icon>
                            </span>
                            <span class="text">Price</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list active">
                        <a href="#">
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
        <h2>Lastest News </h2>
        <p>Check lastest news here</p>
        <div class="news-card-container">
            <?php
            $display_news = mysqli_query($conn, "SELECT * FROM `News`");
            if (mysqli_num_rows($display_news) > 0) {
                //logic to fetch data from db
                while ($row = mysqli_fetch_assoc($display_news)) {
            ?>
                    <!-- News Card 1 -->
                    <div class="news-card">
                        <div class="image-wrapper">
                            <img src="../products/images/<?php print $row['N_Image'] ?>" alt="News Image" class="news-image" width="200px" height="200px">
                        </div>
                        <div class="news-content">
                            <h3 class="news-title"><?php print $row['N_Title'] ?></h3>
                            <p class="news-description"><?php print $row['N_Body'] ?></p>
                        </div>
                    </div>
            <?php
                }
            } else {
                print "No Updated News Available";
            }
            ?>
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