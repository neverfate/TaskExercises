#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*

Задача: дана числовая матрицы N*M, где N - кол-во строк, M - столбцов. Необходимо найти седловые элемент заданной матрицы.

(Седловой эл-т матрицы - элемент матрицы, который одновременно является минимальным элементом в соот.строке матрицы и
максимальным элементом в соот.столбце матрицы).

Выведите все седловые элементы заданной матрицы, если такого эл-та нет - выведите соот.сообщение.

Входные данные: числовая матрица N*M, где эл-ты матрицы - целые числа по модулю не превосходящие 10^4. N, M - от 1 до 10^3.

Вывод: седловые эл-ты матрицы, если такие имеются.

Пример:

[ { 1, 3, 5 },

{ 7, 9, 11 },

{ 13, 15, 17 } ]

Answer = 13
 */

randInit();

//$n = mt_rand(1, 1000); // формируем случайное число n - кол-во строк
//$m = mt_rand(1, 1000); // формируем случайное число m - кол-во столбцов

$n =
$m = 3;

////////////////////////////////////////////////////////////////////////////////

/**
 * Генерирует значение для элемента матрицы
 * @return int
 */
function getElement(): int
{
    return mt_rand(-10000, 10000);
}// getElement

/**
 * Генерирует матрицу
 * @param int $_n
 * @param int $_m
 * @return array
 */
function getMatrix(int $_n, int $_m): array
{
    $matrix = [];

    for ($i = 0; $i < $_n; $i++) {
        for ($j = 0; $j < $_m; $j++) {
            $matrix[$i][$j] = getElement();
        }
    }

    return $matrix;
}// getMatrix

/**
 * Печатает матрицу
 * @param array $_a
 */
function printMatrix(array $_a): void
{
    prLog('[');

    foreach ($_a as $vector) {
        prLog(implode(', ', $vector));
    }

    prLog(']');
}// printMatrix

//

$matrix = getMatrix($n, $m);
/*
$n = 3; // формируем случайное число n - кол-во строк
$m = 3;

$matrix = [
    [1, 3, 5],
    [7, 9, 11],
    [13, 15, 17]
];*/

/*$matrix = [
    [3, 1, 5],
    [7, 9, 11],
    [17, 15, 13]
];*/

/*$matrix = [
  [13, 15, 17],
    [7, 9, 11],
      [1, 3, 5]
];*/

/*$matrix = [
    [6983, -9808, -5731],
    [5332, 1030, -4276],
    [9100, 7136, -705],
    [-4003, 5744, -3022]
];*/


$data  =
$sedlo = [];

// найдем все минимумы в строках
foreach ($matrix as $vector) {

    $j   = 0;          // индекс в строке минимального значения
    $min = $vector[0];


    for ($i = 1; $i < $m; $i++) {
        if ($vector[$i] < $min) {
            $min = $vector[$i];
            $j   = $i;
        }
    }

    // запоминаем индекс и само минимальное значение
    $data[$j]['min'][] = $min;
}

// фильтруем, если оказалось больше 1 минимального значения строк в одном столбце
foreach ($data as $j => $datum) {
    if (count($datum['min']) > 1) {

        $max = $datum['min'][0];

        foreach ($datum['min'] as $value) {
            if ($value > $max) {
                $max = $value;
            }
        }

        $data[$j]['min'] = $max;
    } else {
        $data[$j]['min'] = $datum['min'][0];
    }
}

// находим максимумы в столбцах
foreach ($data as $j => $datum) {
    $max = $datum['min'];

    for ($i = 0; $i < $n; $i++) {
        if ($matrix[$i][$j] > $max) {
            $max = $matrix[$i][$j];
        }
    }

    $data[$j]['max'] = $max;
}

// проверим, равны ли максимумы и минимумы; если равны, то нашли седловой элемент
foreach ($data as $k => $datum) {
    if ($datum['min'] === $datum['max']) {
        $sedlo[] = $datum['min'];
    }
}

//

printMatrix($matrix);

if (count($sedlo) > 0) {
    prLog('Седловые элементы: '. implode(', ', $sedlo));
} else {
    prLog('Седловые элементы не найдены.');
}
