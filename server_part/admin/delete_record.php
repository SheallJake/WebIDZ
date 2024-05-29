<?php
include '../boot.php'; // Include PDO connection

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Check if action is delete and perform deletion
    $table = $_GET['table'];
    $id = $_GET['id'];

    // Prepare the SQL query for deletion
    $sql = "DELETE FROM $table WHERE id = :id";
    $params = [':id' => $id];

    // Execute the prepared statement to delete the record
    $stmt = pdo()->prepare($sql);
    $stmt->execute($params);

    // Redirect to the admin panel after deletion
    header('Location: ./../../admin.php');
    exit;
}
?>