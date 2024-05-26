<?php

require_once __DIR__ . '/boot.php';

//Обнуляем имя пользователя в сессии
$_SESSION['username'] = null;
header('Location: /');
