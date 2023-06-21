<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Major project</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo">
            <h1>Logo</h1>
        </div>
        <div class="menu_open">
            <i class='bx bx-menu'></i>
        </div>
        <ul class="links">
            <div class="menu_close">
                <i class='bx bx-x'></i>
            </div>
            <li><a href="#">Home</a></li>
            <li><a href="./about.html">About</a></li>
            <li><a href="#">Blogs</a></li>
            <?php if(isset($_SESSION["id"])): ?>
            <li><a href="./admin-panel/blogs/index.php">Create blog</a></li>
            <li><a href="./logout.php">Logout</a></li>
                <!-- <li><a href="./admin-panel/blogs/index.php"></a></li> -->
              <?php else: ?>
                <li><a href="./login.php">Login</a></li>
                <?php endif; ?>
        </ul>
    </nav>
    <!-- banner -->
    <div class="slide-container">

        <div class="slide">
            <img src="./images/1.jpg" alt="">
            <div class="caption">Rainbow with snow</div>
        </div>
        <div class="slide">
            <img src="./images/2.jpg" alt="">
            <div class="caption">Nature</div>
        </div>
        <div class="slide">
            <img src="./images/3.jpg" alt="">
            <div class="caption">Stars in the night</div>
        </div>
        <div class="slide">
            <img src="./images/4.jpg" alt="">
            <div class="caption">Island</div>
        </div>
        <div class="slide">
            <img src="./images/4 (2).jpeg" alt="">
            <div class="caption">Trees</div>
        </div>
        <div class="slide">
            <img src="./images/5.jpeg" alt="">
            <div class="caption">Beach</div>
        </div>
        <div class="slide">
            <img src="./images/6.jpeg" alt="">
            <div class="caption">Moon of a night</div>
        </div>
        <div class="slide">
            <img src="./images/7.jpg" alt="">
            <div class="caption">Vlogger </div>
        </div>
        <span class="arrow prev" onclick="controller(-1)">&#10094</span>
        <span class="arrow next" onclick="controller(1)">&#10095</span>
    </div>
    <!-- blog section -->
    <div class="bloggs">
        <div class="container">
            <div class="blogs">
                <div class="heading">
                    <h1>Blogs</h1>
                    <h4>Types of Blogs</h4>
                </div>
                <div class="cards">
                    <div class="card">
                        <img src="./images/10.png" alt="">
                        <p class="tagline">Lifestyle blogs. <span>
                                - June 2023</span></p>
                        <h4 class="title">Lifestyle blogs.</h4>
                        <p class="content">Lifestyle blogs are online platforms where bloggers share their experiences, tips, and recommendations for living a fulfilling and balanced life and way that how we live about ours the lifestyle.</p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/7.jpg" alt="">
                        <p class="tagline">Food blogs. <span>
                                - June 2023</span></p>
                        <h4 class="title">Food blogs.</h4>
                        <p class="content">Food blogs are online platforms where food enthusiasts share their recipes, ideas, and inspiration for cooking and baking. These blogs may include a variety of topics, such as healthy eating, vegetarian or vegan cooking.</p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/12.jpg" alt="" >
                        <p class=" tagline">Travel Blogs. <span>
                            - June 2023</span></p>
                        <h4 class="title">Travelleing.</h4>
                        <p class="content">Travel blogs are online platforms where travelers share their experiences, tips, and recommendations for exploring new destinations. These blogs may include a variety of topics, such as travel itineraries, budgeting tips, and cultural insights. </p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/13.png" alt="">
                        <p class="tagline">Health and fitness blogs.
                            <span>
                                - June 2023</span></p>
                        <h4 class="title">Health and fitness </h4>
                        <p class="content">Health and fitness blogs are online platforms where health and fitness enthusiasts share their tips, ideas, and inspiration for living a healthy and active lifestyle. These blogs may include a variety of topics, such as workout routines, healthy eating habits, and mental health and wellness.</p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/14.png" alt="">
                        <p class=" tagline">Fashion and beauty blogs.
                            <span>
                            - June 2023</span></p>
                        <h4 class="title">Fashion and beauty blogs.</h4>
                        <p class="content">Fashion and beauty blogs are online platforms where fashion and beauty enthusiasts share their tips, ideas, and inspiration for creating stylish and beautiful looks. These blogs may include a variety of topics, such as fashion trends, makeup tutorials, skincare routines, and hair styling tips.</p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/15.jpg" alt="">
                        <p class="tagline">Personal Blogs
                            <span>
                                - June 2023</span></p>
                        <h4 class="title">Personal Blogs</h4>
                        <p class="content">Personal blogs are online platforms where individuals share their thoughts, opinions, and experiences with the world.</p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/16.jpg" alt="">
                        <p class="tagline">DIY Craft Blogs.<span>
                                - June 2023</span></p>
                        <h4 class="title">DIY</h4>
                        <p class="content">DIY craft blogs are online platforms where craft enthusiasts share their ideas, inspiration, and tutorials for creating handmade items. These blogs may include a variety of crafts, such as knitting, sewing, crochet, painting, and more.</p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/17.jpg" alt="">
                        <p class="tagline">Movie Blogs <span>
                                - June 2023</span></p>
                        <h4 class="title">Movie</h4>
                        <p class="content">A movie blog is an online platform where movie enthusiasts share their thoughts, opinions, and reviews about movies. Movie bloggers may write about the latest releases, upcoming movies, and classic films.</p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                    <div class="card">
                        <img src="./images/18.jpg" alt="">
                        <p class="tagline">Interior design blogs. <span>
                                - June 2023</span></p>
                        <h4 class="title">Interior</h4>
                        <p class="content">Interior design blogs are online platforms where interior designers, decorators, and enthusiasts share their ideas and inspiration for creating beautiful and functional spaces. </p>
                        <a href="./blogs.html">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Our services</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order status</a></li>
                        <li><a href="#">Payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Online shop</h4>
                    <ul>
                        <li><a href="#">Watch</a></li>
                        <li><a href="#">Bag</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Dress</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="./js/script.js"></script>
</body>

</html>