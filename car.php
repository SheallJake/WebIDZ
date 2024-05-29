<?php require_once ('server_part/boot.php');
require_once ('server_part/goods.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="/css/car.css">
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
            <a class="logo" href="/"><img src="img/logo.png" class="logo-img"></a>
            <input type="checkbox" id="menu-toggle" class="menu-toggle-checkbox" aria-label="Toggle navigation menu">
            <label for="menu-toggle" class="menu-toggle-label">☰</label>
            <nav id="head-nav" class="head-nav">
                <ul class="head-nav-ul">
                    <li class="head-nav-elem"><a class="link-text" href="/">Home</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="catalog.php">Our Cars</a></li>
                    <li class="head-nav-elem"><a class="link-text" href="#">About</a></li>
                    <li id="nav-line" class="head-nav-elem">
                        <div class="nav-line"></div>
                    </li>
                    <?php if (isset($_SESSION['username']) && $_SESSION['logged_in']) { ?>
                        <li id="user" class="head-nav-elem">
                            <div class="link-text"><?php echo $_SESSION['username']; ?></div>
                            <?php if ($_SESSION['admin']) { ?>
                                <form class="link-text" action="admin.php">
                                    <button class="logout-btn" type="submit">Admin Panel</button>
                                </form>
                            <?php } ?>
                            <form class="link-text" method="post" action="server_part/logout.php">
                                <button class="logout-btn" type="submit">Log Out</button>
                            </form>
                        </li>
                    <?php } else { ?>
                        <li id="SignBtn" class="head-nav-elem">
                            <div class="link-text">Sign In</div>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Getting atributs from other pages -->
    <?php $prd = $_GET['atr'];
    $j = 0;

    foreach ($mass as $key) {
        if ($key['id'] == $prd) {
            $carid = $j;
            break;
        }
        $j++;
    }
    $car = $mass[$carid];
    ?>
    <!-- Main content -->
    <main class="main-content">
        <div class="slide-content">
            <div class="car-name">
                <div class="top-l-shape">
                    <div class="l-top"></div>
                    <div class="l-left"></div>
                </div>

                <h1 class="name-text"><?= $car['name']; ?></h1>
                <div class="bottom-l-shape">
                    <div class="l-bottom"></div>
                    <div class="l-right"></div>
                </div>
            </div>
            <div class="car">
                <img class="car-img" src="<?= $car['img']; ?>">
            </div>

            <div class="car-info">
                <ul class="car-info-ul">
                    <li>Engine: <?= $car['engine']; ?></li>
                    <li>Maximum speed: <?= $car['speed']; ?></li>
                    <li>Acceleration time: <?= $car['acc_time']; ?></li>
                    <li>Number of seats: <?= $car['seats']; ?></li>
                </ul>
                <button class="price"><?php echo $car['price'], '$'; ?></button>
            </div>

        </div>

    </main>


    <div class="dark-bg"></div>
</body>

<!-- Скрипт для формы поиска -->
<script>
    // Получаем форму по ее id
    const form = document.getElementById('search-form');

    // Обработчик события отправки формы
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Предотвращаем обычное поведение формы

        // Получаем значение введенное в поле поиска
        const searchQuery = document.getElementById('search').value;

        // Перенаправляем на страницу "search.php" с передачей поискового запроса в качестве параметра
        window.location.href = 'search.php?query=' + encodeURIComponent(searchQuery);
    });
</script>

<script src="scripts/aut-modal.js"></script>
<script src="scripts/script.js"></script>

</html>