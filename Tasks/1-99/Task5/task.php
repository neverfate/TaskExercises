#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*
 * Дано натуральное число n > 1. Определить длину периода десятичной записи дроби 1/n
 */

/**
 * Рекурсивное вычисление НОД по бинарному алгоритму (Наибольший Общий Делитель)
 * @param int $_a
 * @param int $_b
 * @return int
 */
function _getNOD(int $_a, int $_b): int
{
    if (0 === $_a) {
        return $_b;
    }

    if (0 === $_b) {
        return $_a;
    }

    if ($_a === $_b) {
        return $_a;
    }

    //

    $isEvenA = isEven($_a);
    $isEvenB = isEven($_b);

    if ($isEvenA && $isEvenB) {
        return 2 * getNOD($_a / 2, $_b / 2);
    }

    if ($isEvenA && !$isEvenB) {
        return getNOD($_a / 2, $_b);
    }

    if (!$isEvenA && $isEvenB) {
        return getNOD($_a, $_b / 2);
    }

    if (!$isEvenA && !$isEvenB && $_a < $_b) {
        return getNOD(($_b - $_a) / 2, $_a);
    }

    else /*(!$isEvenA && !$isEvenB && $_a > $_b)*/ {
        return getNOD(($_a - $_b) / 2, $_b);
    }
}// getNOD

//

randInit();

$n = mt_rand(2, 100); // формируем случайное число n
$m = 1;

$p = 0;

////////////////////////////////////////////////////////////////////////////////

// избавляемся от целой части дроби
$m %= $n;

// если есть дробная часть
if ($m > 0) {
    // находим НОД
    $p = _getNOD($m, $n);

    // сокращаем дробь
    $m = floor($m / $p);
    $n = floor($n / $p);

    $p =    // будущая длина предпериода
    $q = 0;

    $z = $n; // будущий остаток знаменателя после деления на 2 и на 5

    // находим длину предпериода дроби (максимум из количества делителей 2 и 5)
    while (isEven($z)) {
        $p++;
        $z = floor($z / 2);
    }

    while (0 === $z % 5) {
        $q++;
        $z = floor($z / 5);
    }

    if ($p < $q) {
        $p = $q;
    }

    //

    // если есть период
    if ($z > 1) {
        $q = 9; // первое число вида 999999999999999999
        $p = 1; // количество разрядов в числе

        while ($q % $z > 0) {
            $p++;
            $q = $q % $z * 10 + 9; //делим по модулю, чтобы избежать переполнения
        }
    } else {
        $p = 0;
    }
}

//

prLog("n = {$n}");
prLog("x = " . (1 / $n));
prLog("p = {$p}");
