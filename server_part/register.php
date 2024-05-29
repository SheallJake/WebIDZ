<?php
require_once ("boot.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = htmlspecialchars(trim($_POST["full_name"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");

    $stmt->execute(['username' => $_POST['username']]);



    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => false, 'message' => 'This username already exists.']);
        die;
    }

    $stmt = pdo()->prepare("INSERT INTO `users` (`full_name`,`username`,`email`, `hashed_password`) VALUES ( :full_name,:username, :email, :hashed_password)");
    $stmt->execute([
        'full_name' => $full_name,
        'username' => $username,
        'email' => $email,
        'hashed_password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
    echo json_encode(['success' => true, 'message' => 'Registration successful!']);
}