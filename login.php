<?php
require_once ("boot.php");
// Error handling and login logic:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Read user data from JSON file with error handling
    $userData = file_get_contents("users.json");
    if (!$userData) {
        echo json_encode(['success' => false, 'message' => 'Error: Could not read user data from \'users.json\'.']);
        exit(); // Exit after sending error response
    } else {
        $users = json_decode($userData, true); // Convert JSON to associative array

        // Validate username and password
        $validLogin = false;
        foreach ($users as $user) {
            if ($user["username"] === $username && password_verify($password, $user["hashed_password"])) { // Use password_verify for secure comparison
                $validLogin = true;
                break;
            }
        }

        if ($validLogin) {
            // Successful login:
            $_SESSION["username"] = $username; // Store username in session
            $_SESSION["logged_in"] = true;

            echo json_encode(['success' => true, 'message' => "Login successful! Welcome $username"]); // Send success response
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);  // Send error response
        }
    }
}
?>