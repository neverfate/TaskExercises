#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*
 * Составьте программу, печатающую все простые числа от 0 до заданного натурального n
 */

randInit();

$n = mt_rand(1, 1000); // формируем случайное число n
//$n = 30;

$raw = range(2, $n); // получим ряд всех чисел от 2 до n

////////////////////////////////////////////////////////////////////////////////

// Решето Эратосфена

$j = -1;

do {
    $p   = $raw[++$j];
    $cnt = count($raw);

    $newRaw = [];
    for ($i = 0; $i <= $j; $i++) {
        if (isset($raw[$i])) {
            $newRaw[] = $raw[$i];
        }
    }

    for ($i = $j + 1; $i < $cnt; $i++) {
        if (0 !== $raw[$i] % $p) {
            $newRaw[] = $raw[$i];
        }
    }

    $raw = $newRaw;
} while ($cnt != count($raw));

//

prLog("n = {$n}");
prLog("raw = " . implode(',', $raw));
