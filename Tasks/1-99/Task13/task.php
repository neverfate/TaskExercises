#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*

Даны две целочисленные матрицы N(a,b) и M(c,d), при этом c<=a и d<=b. Проверить полное вхождение M в N.

*/

////////////////////////////////////////////////////////////////////////////////

function _getMatrixFromMatrix(array $_m, int $_x, int $_w, int $_y, int $_h): array
{
    $rez = [];
    $row = 0;

    for ($i = $_x; $i < $_h + $_x; $i++) {
        $col = 0;

        for ($j = $_y; $j < $_w + $_y; $j++) {
            $rez[$row][$col] = $_m[$i][$j];

            $col++;
        }

        $row++;
    }

    return $rez;
}// getMatrixFromMatrix

function _matrixCompare(array $_m1, array $_m2): bool
{
    foreach ($_m1 as $i => $row) {
        foreach ($_m1 as $j => $col) {
            if ($_m1[$i][$j] !== $_m2[$i][$j]) {
                return false;
            }
        }
    }

    return true;
}// matrixCompare



$M = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 8, 7, 6]
];

$N = [
    [0, 0, 0, 0, 0, 0],
    [0, 1, 2, 3, 4, 0],
    [0, 5, 6, 7, 8, 0],
    [0, 9, 8, 7, 6, 0],
    [0, 0, 0, 0, 0, 0]
];

//

$height = count($M);
$width  = count($M[0]);

$rows = count($N)    - $height + 1;
$cols = count($N[0]) - $width  + 1;

$isInclude = false;

for ($i = 0; $i < $cols; $i++) {
    for ($j = 0; $j < $rows; $j++) {
        $matrix = _getMatrixFromMatrix($N, $i, $width, $j, $height);

        if (_matrixCompare($M, $matrix)) {
            $isInclude = true;
            break(2); // досрочно выходим из вложенного цикла
        }
    }
}

//

if ($isInclude) {
    prLog('Обнаружено полное вхождение.');
} else {
    prLog('Вхождения нет.');
}


