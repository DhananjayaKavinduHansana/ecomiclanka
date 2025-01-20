<?php

session_start();

// Check if the user is already logged in
if (isset($_SESSION['useruid'])) {
    header("Location:../users/useraccount.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-RR</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- loging&registration css -->
    <link rel="stylesheet" href="../assets/css/loging&registration.css">

    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
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
                        <a href="../pages/center.php">
                            <span class="icon">
                                <ion-icon name="cash-outline"></ion-icon>
                            </span>
                            <span class="text">About</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../pages/news.php">
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
                    <li class="list active">
                        <a href="#">
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
    <div class="form-body">
        <h2 class="login-h2">Welcome Back !</h2>
        <form class="loginandregister-form" action="login.php" method="POST">
            <h3>Admin Login</h3>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="userpassword" required>
            </div>
            <button type="submit" name="login" class="form-btn">Login</button><br>
        </form>
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
    <!-- jquery -->
    <script src="../assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstra../p -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count do../wn -->
    <script src="../assets/js/jquery.countdown.js"></script>
    <!-- isotope ../-->
    <script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoint../s -->
    <script src="../assets/js/waypoints.js"></script>
    <!-- owl caro../usel -->
    <script src="../assets/js/owl.carousel.min.js"></script>
    <!-- magnific../ popup -->
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean men../u -->
    <script src="../assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker ../js -->
    <script src="../assets/js/sticker.js"></script>
    <!-- main js ../-->
    <script src="../assets/js/main.js"></script>

</body>

</html>