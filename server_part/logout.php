<?php

require_once __DIR__ . '/boot.php';

$_SESSION['username'] = null;
$_SESSION['admin'] = false;

header('Location: /');
