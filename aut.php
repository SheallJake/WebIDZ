<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized Page</title>
</head>

<body>

    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

    <p>This is an authorized page. Only logged-in users can access it.</p>

    <a href="logout.php">Logout</a>

</body>