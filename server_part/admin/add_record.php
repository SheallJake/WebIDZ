<?php
include '../boot.php'; // Include PDO connection
$pdo = pdo();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = 'INSERT INTO ' . $_POST['table'] . ' (';
    $params = [];
    foreach ($_POST as $key => $value) {
        if ($key !== 'table' && $key !== 'id') {
            $sql .= $key . ', ';
            $params[':' . $key] = $value; // Collect parameters for execution
        }
    }
    $sql = rtrim($sql, ', ');
    $sql .= ') VALUES ('; // Remove the trailing comma and space

    foreach ($_POST as $key => $value) {
        if ($key !== 'table' && $key !== 'id') {
            $sql .= ':' . $key . ', ';
        }
    }
    $sql = rtrim($sql, ', ');
    $sql .= ')';
    // Execute the prepared statement with the collected parameters
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    header('Location:  ./../../admin.php');
    exit;
}
?>