<?php
include 'products/connect.php';

if (isset($_POST['view_more'])) {
    header('location:pages/news.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecomic lanka</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/slider.css">
</head>

<body>
    <header>
        <div class="nav-body">
            <div class="navigation">
                <ul>
                    <li class="list active">
                        <a href="#home">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="text">Home</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#about">
                            <span class="icon">
                                <ion-icon name="information-outline"></ion-icon>
                            </span>
                            <span class="text">About</span>
                            <span class="circle"></span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#news">
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
                        <a href="logins/login.php">
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
    <div class="container" id="home">
        <h1>ecomic lanka</h1>

        <p>
            Explore Daily wholesale vegetable prices in Sri Lankan Dedicated economic centers in Sri Lanka
        </p>
        <button type="submit" class="explore-to-price"><a href="pages/center.php">See Prices</a></button>
        <div class="logo">
            <img src="assets/img/logo.png" alt="" align="center">
        </div>
    </div>
    <div class="about-section" id="about">
        <h1>Why This ?</h1>
        <p>
            <span><b>What is this web Appication?</b></span><br> I'm Dhananjaya Kavindu Hansana.
            My father is a farmer.So my father wants to know about daily wholesale vegetable prices in Sri Lankan economic centers in Sri Lanka
            because he needs to sell his vegetables at good prices.
            So I thought of developing this web site to get daily updates from economic centers to farmers about all vegetables prices in every center.<br>
            <b>This website will open for all farmers for my father.</b>
        </p>
    </div>
    <div class="news-section" id="news">
        <h1>Last Updates</h1>
        <p>Daily Updated News and Announcements</p>

        <div class="slide-container swiper">
            <div class="swiper-wrapper">
                <?php
                $display_news = mysqli_query($conn, "SELECT * FROM `News`");
                if (mysqli_num_rows($display_news) > 0) {
                    while ($row = mysqli_fetch_assoc($display_news)) {
                ?>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
                                <div class="card-image">
                                    <img src="products/images/<?php echo $row['N_Image']; ?>" alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-content">
                                <h2 class="name"><?php echo $row['N_Title']; ?></h2>
                                <p class="description"><?php echo $row['N_Body']; ?></p>
                                <form method="post">
                                    <button type="submit" class="button" name="view_more">View More</button>
                                </form>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No Updated News Available";
                }
                ?>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- JavaScript -->
    <script src="JS/main.js"></script>
    <script>
        // Initialize Swiper
        const swiper = new Swiper('.swiper', {
            loop: true,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
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
    <script src="JS/main.js"></script>
</body>

</html>