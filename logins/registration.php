<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration-RR</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rooster Outlet</title>

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

    </head>

    <body>

        <!--PreLoader-->
        <div class="loader">
            <div class="wavy">
                <span style="--i:1;">L</span>
                <span style="--i:2;">O</span>
                <span style="--i:3;">A</span>
                <span style="--i:4;">D</span>
                <span style="--i:5;">I</span>
                <span style="--i:6;">N</span>
                <span style="--i:7;">G</span>
                <span style="--i:8;">.</span>
                <span style="--i:9;">.</span>
                <span style="--i:10;">.</span>
            </div>
        </div>
        <!--PreLoader Ends-->

        <!-- header -->
        <div class="top-header-area" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <div class="main-menu-wrap">
                            <!-- logo -->
                            <div class="site-logo">
                                <a href="../index.html">
                                    <img src="../assets/img/logo.png" alt="">
                                </a>
                            </div>
                            <!-- logo -->

                            <!-- menu start -->
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="../index.php">Home</a></li>
                                    <li><a href="../about.php">About</a></li>
                                    <li><a href="../news.php">News</a></li>
                                    <li><a href="../contact.php">Contact</a></li>
                                    <li><a href="../shop.php">Shop</a></li>
                                    <li>
                                        <div class="header-icons">
                                            <a class="shopping-cart" href="../cart.php"><i
                                                    class="fas fa-shopping-cart"></i></a>
                                            <a class="mobile-hide search-bar-icon" href="#"><i
                                                    class="fas fa-search"></i></a>
                                            <a class="user-login" href="./login.html"><i class="fas fa-user"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                            <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                            <div class="mobile-menu"></div>
                            <!-- menu end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->

        <!-- search area -->
        <div class="search-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="close-btn"><i class="fas fa-window-close"></i></span>
                        <div class="search-bar">
                            <div class="search-bar-tablecell">
                                <h3>Search For:</h3>
                                <input type="text" placeholder="Keywords">
                                <button type="submit">Search <i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end search area -->
        <div class="form-body">
            <h2 class="login-h2">Welcome New User !</h2>
            <form class="loginandregister-form" action="register.php" method="POST">
                <h3>Register Here</h3>
                <div class="input-group">
                    <input type="text" placeholder="Name" name="name" required>
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <select name="user_type" id="">
                                        <option value="">Select User Type</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Delivery Boy">Delivery Boy</option>
                                        <option value="Customer">Customer</option>
                                    </select>
                    <input type="text" placeholder="Phone Number (07x-)" name="phone" maxlength="10" required>
                    <select name="user_center" id="">
                                        <option value="">Select User Center</option>
                                        <option value="keppetipola">Staff</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Delivery Boy">Delivery Boy</option>
                                        <option value="Customer">Customer</option>
                                    </select>
                    <input type="password" placeholder="Password" name="password" maxlength="8" required>
                    <input type="password" placeholder="Retype Password" name="passwordRepeat" maxlength="8" required>
                </div>
                <button type="submit" name="register" class="form-btn">Register</button><br>
                <p class="login-register-text">Do You have an account? <a href="userlogin.php">Login Here</a></p>
            </form>
        </div>






        <!-- footer -->
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box about-widget">
                            <h2 class="widget-title">About us</h2>
                            <p> Red Rooster Farm Outlet is your one-stop destination for fresh,
                                locally sourced produce and meats. Our commitment to quality and sustainability ensures
                                that you receive the finest meats, dairy products, vegetables, and fruits available</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box get-in-touch">
                            <h2 class="widget-title">Get in Touch</h2>
                            <ul>
                                <li>34/8, Red Rooster, Main Street, Belgium.</li>
                                <li>redroosteronlinesp@email.com</li>
                                <li>+00 111 222 3333</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box subscribe">
                            <h2 class="widget-title">Subscribe</h2>
                            <p>Subscribe to our mailing list to get the latest updates.</p>
                            <form action="../index.html">
                                <input type="email" placeholder="Email">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer -->

        <!-- copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>Copyrights &copy; <script>
                            document.write(new Date().getFullYear());
                            </script> - All Rights Reserved. Re-Design By - <a href="#">Dhananjaya</a>
                        </p>
                    </div>
                    <div class="col-lg-6 text-right col-md-12">
                        <div class="social-icons">
                            <ul>
                                <li><a href="https://www.facebook.com/dhanu.hansana.5" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https-in://www.linkedin.com/in/dhananjaya-kavindu-a9644a215"><i
                                            class="fab fa-linkedin"></i></a></li>
                                <li><a href="https://github.com/DhananjayaKavinduHansana"><i
                                            class="fab fa-github"></i></a>
                                </li>
                                <li><a href="https://www.behance.net/dhananjkavindu"><i class="fab fa-behance"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end copyright -->

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
</body>

</html>