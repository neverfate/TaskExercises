#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*
 * Даны два натуральных числа a и b, не равные нулю одновременно.
 * Вычислите Наибольший Общий Делитель (НОД) a и b.
 */

randInit();

$a =
$b = 0;

do {
    //$a = 1071;
    //$b = 462;

    //$a = 522;
    //$b = 136;

    $a = mt_rand(0, 1000); // формируем случайное число a
    $b = mt_rand(0, $a);  // формируем случайное число b
} while (0 === $a && 0 === $b);

////////////////////////////////////////////////////////////////////////////////

$m   = $a;
$NOD =
$n   =
$r   = $b;

// Алгоритм Евклида

while (0 !== $r = $m % $r) {
    $m   = $NOD;
    $NOD = $r;
}

////////////////////////////////////////////////////////////////////////////////

// Бинарный алгоритм

/**
 * Рекурсивное вычисление НОД по бинарному алгоритму
 * @param int $_a
 * @param int $_b
 * @return int
 */
function NOD(int $_a, int $_b): int
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
        return 2 * NOD($_a / 2, $_b / 2);
    }

    if ($isEvenA && !$isEvenB) {
        return NOD($_a / 2, $_b);
    }

    if (!$isEvenA && $isEvenB) {
        return NOD($_a, $_b / 2);
    }

    if (!$isEvenA && !$isEvenB && $_a < $_b) {
        return NOD(($_b - $_a) / 2, $_a);
    }

    else /*(!$isEvenA && !$isEvenB && $_a > $_b)*/ {
        return NOD(($_a - $_b) / 2, $_b);
    }
}// NOD

//

prLog("a = {$a}");
prLog("b = {$b}");
prLog("NOD Evklid = {$NOD}");
prLog("NOD Binary = " . NOD($a, $b));
