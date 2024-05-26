<?php require_once ('server_part/boot.php');
require_once ('server_part/goods.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/loginmodal.css">
    <link rel="stylesheet" href="/css/headcont.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jura:wght@300..700&family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Jura:wght@300..700&family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <!-- Sign Up - Login -->


    <div class="login-page">
        <div class="form">
            <form id="register-form" class="register-form" method="post" onsubmit="return handleRegisterForm(event)">
                <span class="close">&times;</span>
                <h2>Register</h2>
                <input type="text" placeholder="Full Name *" name="full_name" required>
                <input type="text" placeholder="Username *" name="username" required>
                <input type="email" placeholder="Email *" name="email" required>
                <input type="password" placeholder="Password *" name="password" required>
                <button class="btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Create
                </button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form id="login-form" class="login-form" method="post" onsubmit="return handleLoginForm(event)">
                <span class="close">&times;</span>
                <h2></i> Login</h2>
                <input id="username" type="text" placeholder="Username" required />
                <input id="password" type="password" placeholder="Password" required />
                <button class="btn" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Sign in
                </button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>



    <header>
        <div class="header-content">
            <a class="logo" href="index.php"> <img src="img/logo.png" class="logo-img"></a>
            <nav class="head-nav">
                <ul class="head-nav-ul">
                    <li class="head-nav-elem"><a class="link-text" href="index.php">Home</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="catalog.php">Our Cars</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">About</a></li>
                    <li class="head-nav-elem">
                        <div class="nav-line"></div>
                    </li>
                    <?php

                    if (isset($_SESSION['username']) && $_SESSION['logged_in']) { ?>
                        <li id="user" class="head-nav-elem">
                            <div class="link-text"> <?php echo $_SESSION['username']; ?> </div>
                            <form class="head-nav-elem" method="post" action="server_part/logout.php">
                                <button class="head-nav-elem link-text logout-btn" type="submit" class="">Log Out</button>
                            </form><?php
                    } else { ?>
                        <li id="SignBtn" class="head-nav-elem">
                            <div class="link-text">Sign In</div>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </nav>

        </div>
    </header>


    <!-- Main content -->
    <main>
        <div id="cont" class="cont">
            <div></div>
            <div class="slider">
                <!-- 1st Page -->
                <div data-target="1" class="slide slide--1">
                    <div class="slide-content">
                        <div class="mainpage-text">
                            <h1 class="mtext-1">Your desires are</h1>
                            <p class="mtext-2">limited only by speed</p>
                            <p class="mtext-3">Discover our vehicles</p>
                        </div>
                    </div>
                    <div class="slide__darkbg slide--1__darkbg"></div>
                </div>
                <!-- 2nd Page -->

                <div data-target="2" class="slide slide--2">
                    <div class="slide__darkbg slide--2__darkbg"></div>
                    <div class="slide-content">
                        <div class="car-name">
                            <div class="top-l-shape">
                                <div class="l-top"></div>
                                <div class="l-left"></div>
                            </div>

                            <h1 class="name-text"><?php echo $mass[0]['name']; ?></h1>
                            <div class="bottom-l-shape">
                                <div class="l-bottom"></div>
                                <div class="l-right"></div>
                            </div>
                        </div>
                        <div class="car">
                            <img class="car-img" src="<?php echo $mass[0]['img']; ?>">
                        </div>

                        <div class="car-info">
                            <ul class="car-info-ul">
                                <li>Engine: <?php echo $mass[0]['engine']; ?></li>
                                <li>Maximum speed: <?php echo $mass[0]['speed']; ?></li>
                                <li>Acceleration time: <?php echo $mass[0]['acc_time']; ?></li>
                                <li>Number of seats: <?php echo $mass[0]['seats']; ?></li>
                            </ul>
                            <button class="price"><?php echo $mass[0]['price'], '$'; ?></button>
                        </div>

                        <div class="spray">
                            <img class="spray-img" src="img/spray/spray1.png">
                        </div>
                        <div class="blur">
                            <div class="back-light">
                                <div class="triangle"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div data-target="3" class="slide slide--3">
                    <div class="slide__darkbg slide--3__darkbg"></div>
                    <div class="slide-content">
                        <div class="car-name">
                            <div class="top-l-shape">
                                <div class="l-top"></div>
                                <div class="l-left"></div>
                            </div>
                            <h1 class="name-text"><?php echo $mass[1]['name']; ?></h1>
                            <div class="bottom-l-shape">
                                <div class="l-bottom"></div>
                                <div class="l-right"></div>
                            </div>
                        </div>
                        <div class="car">
                            <img class="car-img" src="<?php echo $mass[1]['img']; ?>">
                        </div>

                        <div class="car-info">
                            <ul class="car-info-ul">
                                <li>Engine: <?php echo $mass[1]['engine']; ?></li>
                                <li>Maximum speed: <?php echo $mass[1]['speed']; ?></li>
                                <li>Acceleration time: <?php echo $mass[1]['acc_time']; ?></li>
                                <li>Number of seats: <?php echo $mass[1]['seats']; ?></li>
                            </ul>
                            <button class="price"><?php echo $mass[1]['price'], '$'; ?></button>
                        </div>

                        <div class="spray">
                            <img class="spray-img" src="img/spray/spray2.png">
                        </div>
                        <div class="blur">
                            <div class="back-light">
                                <div class="triangle"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div data-target="4" class="slide slide--4">
                    <div class="slide__darkbg slide--4__darkbg"></div>
                    <div class="slide-content">
                        <div class="car-name">
                            <div class="top-l-shape">
                                <div class="l-top"></div>
                                <div class="l-left"></div>
                            </div>
                            <h1 class="name-text"><?php echo $mass[2]['name']; ?></h1>
                            <div class="bottom-l-shape">
                                <div class="l-bottom"></div>
                                <div class="l-right"></div>
                            </div>
                        </div>
                        <div class="car">
                            <img class="car-img" src="<?php echo $mass[2]['img']; ?>">
                        </div>

                        <div class="car-info">
                            <ul class="car-info-ul">
                                <li>Engine: <?php echo $mass[2]['engine']; ?></li>
                                <li>Maximum speed: <?php echo $mass[2]['speed']; ?></li>
                                <li>Acceleration time: <?php echo $mass[2]['acc_time']; ?></li>
                                <li>Number of seats: <?php echo $mass[2]['seats']; ?></li>
                            </ul>
                            <button class="price"><?php echo $mass[2]['price'], '$'; ?></button>
                        </div>

                        <div class="spray">
                            <img class="spray-img" src="img/spray/spray3.png">
                        </div>
                        <div class="blur">
                            <div class="back-light">
                                <div class="triangle"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div data-target="5" class="slide slide--5">
                    <div class="slide-content">
                        <div class="slide5-center">

                            <h1>All our dreams can come true if we have the courage to pursue them.</h1>
                            <h3>-Walt Disney</h3>

                            <button class="catalog-button" onclick="location.href='catalog.php'">
                                Go to the catalog
                            </button>
                        </div>
                        <footer>
                            <div class="foo-contacts">
                                <h1>NFS team:</h1>
                                <div class="contact">
                                    <img src="img/contacts/shealljake.jpg" alt="">
                                    <p>SheallJake</p>
                                </div>
                                <hr />
                                <div class="contact">
                                    <img src="img/contacts/homurgin.png" alt="">
                                    <p>Homurgin</p>
                                </div>
                            </div>
                        </footer>
                    </div>
                    <div class="slide__darkbg slide--5__darkbg"></div>

                </div>

            </div>
            <ul class="nav">

        </div>
    </main>

</body>

<script src="scripts/slider.js"></script>
<script src="scripts/aut-modal.js"></script>
<script src="scripts/script.js"></script>

</html>