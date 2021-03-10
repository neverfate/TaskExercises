#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*

Найти минимальное, максимальное и среднее значение в массиве целых чисел

*/

$n = 10; // размер массива

$min = 1;   // мин.  значение для инициализации массива
$max = 100; // макс. значение для инициализации массива

randInit();

$a = [];

// заполним массив случайными числами
for ($i = 0; $i < $n; $i++) {
    $a[] = mt_rand($min, $max);
}

////////////////////////////////////////////////////////////////////////////////

$min =
$max = $a[0];

$avg = 0;

for ($i = 0; $i < $n; $i++) {
    $cur = $a[$i];

    if ($cur < $min) {
        $min = $cur;
    } elseif ($cur > $max) {
        $max = $cur;
    }

    $avg += $cur;
}

$avg /= $n;

prLog('['. implode(', ', $a) .']');
prLog("min = {$min}, проверка = ". min($a));
prLog("max = {$max}, проверка = ". max($a));
prLog("avg = {$avg}, проверка = ". (array_sum($a) / $n));
