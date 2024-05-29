<?php
require_once ("boot.php");
// Error handling and login logic:
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");

    //Выполняем запрос, подставляя с помощью переменной $_POST введённое имя пользователя
    $stmt->execute(['username' => $username]);

    if (!$stmt->rowCount()) {
        echo json_encode(['success' => false, 'message' => 'Invalid username.']);
        die;
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    if (password_verify($password, $user['hashed_password'])) {
        // Проверяем, не нужно ли использовать более новый алгоритм
        // или другую алгоритмическую стоимость
        // Например, если вы поменяете опции хеширования
        if (password_needs_rehash($user['hashed_password'], PASSWORD_DEFAULT)) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);

            //С помощью PDO готовим запрос на проверку на наличие пользователя в БД
            $stmt = pdo()->prepare('UPDATE `users` SET `hashed_password` = :password WHERE `username` = :username');
            //Выполняем запрос в БД
            $stmt->execute([
                'username' => $_POST['username'],
                'password' => $newHash,
            ]);
        }
        $username = $user['username'];
        $_SESSION["username"] = $username;
        $_SESSION["logged_in"] = true;
        $_SESSION["admin"] = $user['admin'];
        echo json_encode(['success' => true, 'message' => 'Welcome back!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid password.']);
    }
}