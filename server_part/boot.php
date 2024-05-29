<?php


session_start();


function pdo(): PDO
{
    static $pdo;

    if (!$pdo) {
        if (file_exists(__DIR__ . '/config.php')) {
            include __DIR__ . '/config.php';
        } else {
            $msg = 'Не знайдено config.php';
            trigger_error($msg, E_USER_ERROR);
        }

        $dsn = 'mysql:dbname=' . $config['db']['name'] . ';host=' . $config['db']['server'];

        $pdo = new PDO($dsn, $config['db']['username'], $config['db']['password']);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}