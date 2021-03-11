#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*

Составьте программу для вычисления произведения двух матриц целых числе M(a, b) и N(c, d)

a*b c*d => a*d

*/

////////////////////////////////////////////////////////////////////////////////

$a = 3; // размер
$b = 3; // матрицы M

$c = 3; // размер
$d = 4; // матрицы N

if ($b == $c) {

    // генерируем исходные матрицы
    $M = getMatrix($a, $b);
    $N = getMatrix($c, $d);

    /*$M = [
        [0, 0, 0],
        [0, 0, 0],
        [1, 2, 3]
    ];

    $N = [
        [0, 0, 4, 0],
        [0, 0, 5, 0],
        [0, 0, 6, 0]
    ];*/

    $R = [];

    ////////////////////////////////////////

    // обходим все элементы новой матрицы и вычисляем их значения
    for ($i = 0; $i < $a; $i++) {

        // берем вектор строки первой матрицы
        $row = getMatrixRow($M, $i);

        for ($j = 0; $j < $d; $j++) {
            // перемножаем 2 вектора, получая значение элемента r(i,j) новой матрицы
            $R[$i][$j] = vectorMulti(
                $row,
                getMatrixCol($N, $j) // берем вектор столбца второй матрицы
            );
        }
    }

    //

    printMatrix($M);
    printMatrix($N);
    printMatrix($R);
} else {
    prLog('Указана неправильная размерность матриц.');
}