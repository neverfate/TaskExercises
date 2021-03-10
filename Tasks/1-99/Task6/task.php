#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*
 * Составьте программу, печатающую разложение на простые множители заданного натурального числа n > 0
 */

randInit();

$n = mt_rand(1, 100); // формируем случайное число n

////////////////////////////////////////////////////////////////////////////////

function multiExplain(int $_n, array &$_input): void
{
    $div = [2, 3, 5, 7];

    foreach ($div as $a) {
        if (0 === $_n % $a) {
            $_input[] = $a;
            multiExplain($_n / $a, $_input);
            return;
        }
    }
}// multiExplain

//

$input = [];
multiExplain($n, $input);

//

prLog("n = {$n}");

if (array_product($input) === $n) {
    prLog(implode(' * ', $input));
} else {
    prLog('Нельзя разложить на простые множители.');
}
