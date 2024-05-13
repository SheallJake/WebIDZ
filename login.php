<?php

// Retrieve the username and password from the POST request
// $data = json_decode(file_get_contents('php://input'), true);
$username = 'admin';
$password = 'password';

// Check if the username and password are valid (for demonstration purpose, the credentials are hardcoded)
if ($username === 'admin' && $password === 'password') {
    // Start a session and set session variables
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    http_response_code(200); // Success
} else {
    http_response_code(401); // Unauthorized
}
?>