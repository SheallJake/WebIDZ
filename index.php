<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <!-- Sign Up - Login -->


    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <span class="close">&times;</span>
                <h2>Register</h2>
                <input type="text" placeholder="Full Name *" required />
                <input type="text" placeholder="Username *" required />
                <input type="email" placeholder="Email *" required />
                <input type="password" placeholder="Password *" required />
                <button class="btn">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Create
                </button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form id="login-form" class="login-form">
                <span class="close">&times;</span>
                <h2></i> Login</h2>
                <input id="username" type="text" placeholder="Username" required />
                <input id="password" type="password" placeholder="Password" required />
                <button class="btn" type="submit">
                    Sign in
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
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
                    <li class="head-nav-elem"><a class="link-text" href="#">Our Cars</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">Special Offers</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">Services</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">Pages</a></li>
                    <li class="head-nav-elem">
                        <div class="nav-line"></div>
                    </li>
                    <li id="SignBtn" class="head-nav-elem">
                        <div class="link-text" href="#">Sign Up</div>
                    </li>

                </ul>
            </nav>

        </div>
    </header>

    <main>
        <div id="cont" class="cont">
            <div></div>
            <div class="slider">
                <div data-target="1" class="slide slide--1">
                    <p></p>
                    <div class="slide__darkbg slide--1__darkbg"></div>
                </div>
                <div data-target="2" class="slide slide--2">
                    <div class="slide__darkbg slide--2__darkbg"></div>
                </div>
                <div data-target="3" class="slide slide--3">
                    <div class="slide__darkbg slide--3__darkbg"></div>
                </div>
                <div data-target="4" class="slide slide--3">
                    <div class="slide__darkbg slide--3__darkbg"></div>
                </div>
                <div data-target="5" class="slide slide--4">
                    <div class="slide__darkbg slide--4__darkbg"></div>
                </div>
            </div>
            <ul class="nav">

        </div>
    </main>


    <footer></footer>
</body>

<script src="scripts/slider.js"></script>
<script src="scripts/aut-modal.js"></script>
<script src="scripts/aut.js"></script>

</html>