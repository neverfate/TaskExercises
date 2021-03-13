#!/usr/bin/php
<?php

use JetBrains\PhpStorm\Pure;

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*

Составьте программу для вычисления произведения двух матриц целых числе M(a, b) и N(c, d)

a*b c*d => a*d

*/

/**
 * Генерирует значение для элемента матрицы
 * @return int
 */
#[Pure] function _getElement(): int
{
    return mt_rand(-10000, 10000);
}// getElement

////////////////////////////////////////////////////////////////////////////////

/**
 * Генерирует матрицу
 * @param int $_n
 * @param int $_m
 * @return array
 */
function _getMatrix(int $_n, int $_m): array
{
    $matrix = [];

    for ($i = 0; $i < $_n; $i++) {
        for ($j = 0; $j < $_m; $j++) {
            $matrix[$i][$j] = _getElement();
        }
    }

    return $matrix;
}// getMatrix

/**
 * Перемножение 2х одноразмерных векторов
 * @param array $_v1
 * @param array $_v2
 * @return int|float
 */
function _vectorMulti(array $_v1, array $_v2): int|float
{
    $v1Cnt = count($_v1);
    $v2Cnt = count($_v2);

    if ($v1Cnt == $v2Cnt) {

        $rez = 0;

        for ($i = 0; $i < $v1Cnt; $i++) {
            $rez += $_v1[$i] * $_v2[$i];
        }

        return $rez;

    } else {
        die('Vectors sizes mismatch');
    }
}// vectorMulti

////////////////////////////////////////////////////////////////////////////////

/**
 * Получение строки матрицы в виде вектора
 * @param array $_m
 * @param int $_i
 * @return array
 */
function _getMatrixRow(array $_m, int $_i = 0): array
{
    return $_m[$_i];
}// getMatrixRow

////////////////////////////////////////////////////////////////////////////////

/**
 * Получение столбца матрицы в виде вектора
 * @param array $_m
 * @param int $_j
 * @return array
 */
function _getMatrixCol(array $_m, int $_j = 0): array
{
    $col = [];
    $cnt = count($_m);

    for ($i = 0; $i < $cnt; $i++) {
        $col[] = $_m[$i][$_j];
    }

    return $col;
}// getMatrixRow

////////////////////////////////////////////////////////////////////////////////

$a = 3; // размер
$b = 3; // матрицы M

$c = 3; // размер
$d = 4; // матрицы N

if ($b == $c) {

    // генерируем исходные матрицы
    $M = _getMatrix($a, $b);
    $N = _getMatrix($c, $d);

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
        $row = _getMatrixRow($M, $i);

        for ($j = 0; $j < $d; $j++) {
            // перемножаем 2 вектора, получая значение элемента r(i,j) новой матрицы
            $R[$i][$j] = _vectorMulti(
                $row,
                _getMatrixCol($N, $j) // берем вектор столбца второй матрицы
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
