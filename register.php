<?php
require_once ("boot.php");
// Error handling and registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = htmlspecialchars(trim($_POST["full_name"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    // Basic data validation (same as before)
    $errors = [];
    if (empty($full_name)) {
        $errors[] = 'Full Name is required.';
    }
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    // Check if username already exists (assuming unique usernames in users.json)
    $userData = json_decode(file_get_contents("users.json"), true);
    if ($userData) {
        foreach ($userData as $user) {
            if ($user["username"] === $username) {
                $errors[] = 'Username already exists.';
                break; // Exit the loop after finding a username match
            }
        }
    }

    // No errors: Process registration
    if (empty($errors)) {
        // Generate secure password hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare new user data for JSON
        $new_user = [
            "full_name" => $full_name,
            "username" => $username,
            "email" => $email,
            "hashed_password" => $hashed_password
        ];

        // Read and update users.json (caution: potential race conditions)
        $userData = json_decode(file_get_contents("users.json"), true);
        if ($userData) {
            $userData[] = $new_user; // Append new user data to the existing array
            $json_data = json_encode($userData, JSON_PRETTY_PRINT); // Consider using JSON_PRETTY_PRINT for readability
            if (file_put_contents("users.json", $json_data) !== false) {
                echo json_encode(['success' => true, 'message' => 'Registration successful!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: Could not update users.json.']);
            }
        } else {
            // Create users.json with the new user if it doesn't exist
            $json_data = json_encode([$new_user], JSON_PRETTY_PRINT);
            if (file_put_contents("users.json", $json_data) !== false) {
                echo json_encode(['success' => true, 'message' => 'Registration successful!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: Could not create users.json.']);
            }
        }
    } else {
        // Registration failed: Return errors
        $error_message = implode('<br>', $errors); // Join errors into a string with line breaks
        echo json_encode(['success' => false, 'message' => $error_message]);
    }
}
?>