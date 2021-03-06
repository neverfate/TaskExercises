#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*
 * Выполнить поворот квадратной матрицы M по часовой стрелке без использования вспомогательной матрицы
 */

randInit();

$a =
$x = mt_rand(1, 9); // формируем случайное число a
$b = mt_rand(1, 9); // формируем случайное число b

/*
 * числа 1-9 выбраны для удобства проверки результатов, ибо - таблица умножения
 */

////////////////////////////////////////////////////////////////////////////////

$i = 0;

/*
 * Поскольку операция умножения есть суть сложение чила с самим собой некоторое количество раз,
 * то складываем a и a - b раз
 */
while (++$i != $b) {
    $x += $a;
}

prLog("a = {$a}");
prLog("b = {$b}");
prLog("x = {$x}");
