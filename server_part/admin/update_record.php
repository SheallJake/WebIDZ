<?php
include '../boot.php'; // Include PDO connection
$pdo = pdo();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepare the SQL query with placeholders for parameters
    $sql = 'UPDATE ' . $_POST['table'] . ' SET ';
    $params = [];
    foreach ($_POST as $key => $value) {
        if ($key !== 'table' && $key !== 'id') {
            $sql .= $key . ' = :' . $key . ', ';
            $params[':' . $key] = $value; // Collect parameters for execution
        }
    }
    $sql = rtrim($sql, ', '); // Remove the trailing comma and space
    $sql .= ' WHERE id = :id'; // Add the WHERE clause

    // Execute the prepared statement with the collected parameters
    $stmt = $pdo->prepare($sql);
    $params[':id'] = $_POST['id']; // Add the ID parameter
    $stmt->execute($params);

    // Redirect to the admin panel after updating the record
    header('Location:  ./../../admin.php');
    exit;
}
?>