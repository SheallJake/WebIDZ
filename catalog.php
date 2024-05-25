<?php
require_once ('boot.php');
require_once ('goods.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="/css/catalog.css">
    <link rel="stylesheet" href="/css/styles.css">
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
            <div class="logo"> <img src="img/logo.png" class="logo-img"></div>
            <nav class="head-nav">
                <ul class="head-nav-ul">
                    <li class="head-nav-elem"><a class="link-text" href="#">Home</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="catalog.php">Our Cars</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">Special Offers</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">Services</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">Pages</a></li>
                    <li class="head-nav-elem">
                        <div class="nav-line"></div>
                    </li>
                    <?php

                    if (isset($_SESSION['username']) && $_SESSION['logged_in']) { ?>
                        <li id="user" class="head-nav-elem">
                            <div class="link-text"> <?php echo $_SESSION['username']; ?> </div>
                            <form class="head-nav-elem" method="post" action="logout.php">
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
    <main class="main-content">
        <div class="catalog">
            <ul class="catalog-ul">
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>
                <li class="catalog-li">машина 1231231231231234</li>

                <li class="catalog-li">машина 1231231231231234</li>
            </ul>

        </div>
    </main>


    <div class="dark-bg"></div>
</body>

<script src="scripts/aut-modal.js"></script>
<script src="script.js"></script>

</html>