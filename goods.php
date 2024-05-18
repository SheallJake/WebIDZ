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

// //Переменная сохраняет количество товаров в массиве(-1 для использование значений в индексах массива)
// $cnt = count($mass) - 1;

// //Создаем 4 переменных которые будут хранить іd случайных товаров для их последующего вывода в разделе "Вам може сподобатись" 
// //
// //Присваеваем рандомное значение в диапазоне от 0 до $cnt(Количество товаров без акции)
// $a = rand(0, $cnt);
// do {
//     $b = rand(0, $cnt);
// }
// //Цикл исключает повторение товаров
// while (($b == $a));

// do {
//     $c = rand(0, $cnt);
// }
// while (($c == $a or $c == $b));

// do {
//     $d = rand(0, $cnt);
// }
// while (($d == $a or $d == $b or $d == $c));

?>