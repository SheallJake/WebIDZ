<?php
require_once ("boot.php");
// Error handling and registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = htmlspecialchars(trim($_POST["full_name"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    //Создаем запрос PDO
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");
    //Выполняем запрос
    $stmt->execute(['username' => $_POST['username']]);


    //Проверяем, не занят ли введённый логин
    //Если да, то выводим уведомление и переходим на главную
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => false, 'message' => 'This username already exists.']);
        die;
    }

    //Если логин не занят, готовим запрос на добавление в таблицу нового пользователя
    $stmt = pdo()->prepare("INSERT INTO `users` (`full_name`,`username`,`email`, `hashed_password`) VALUES ( :full_name,:username, :email, :hashed_password)");
    $stmt->execute([
        'full_name' => $full_name,
        'username' => $username,
        'email' => $email,
        'hashed_password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
    echo json_encode(['success' => true, 'message' => 'Registration successful!']);
}