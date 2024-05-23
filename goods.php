<?php

require_once __DIR__ . '/boot.php';

//Готовим запрос PDO
$result = pdo()->prepare("SELECT * FROM `products`");
//Выполняет запрос
$result->execute();
//Создаем массивы для хранения товаров
//
//Отделяем акционные товары от обычных
$mass = array();

//Пока переменная $rec может принимать данные с БД будет выполнятся цикл который сортирует данные по масивам
while ($rec = $result->fetch(PDO::FETCH_ASSOC)) {
    array_push($mass, $rec);
}
