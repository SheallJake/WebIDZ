<?php

require_once __DIR__ . '/boot.php';

$result = pdo()->prepare("SELECT * FROM `products`");
$result->execute();

$mass = array();

while ($rec = $result->fetch(PDO::FETCH_ASSOC)) {
    array_push($mass, $rec);
}
