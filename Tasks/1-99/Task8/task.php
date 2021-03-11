#!/usr/bin/php
<?php

require_once '/var/www/TaskExercises/vendor/autoload.php';

/*

Даны N отрезков с различными координатами начала и конца. Найти количество полных вхождений каждого отрезка в каждый.

*/

randInit();

$n = mt_rand(2, 10); // количество отрезков

////////////////////////////////////////////////////////////////////////////////

/**
 * @param int $_min
 * @param int $_max
 * @return array
 */
function getChunk(int $_min, int $_max): array
{
    return [
        mt_rand(0, $_min),
        mt_rand($_min, $_max),
    ];
}// getChunk

//

$matrix =
$result = [];

for ($i = 0; $i < $n; $i++) {
    $matrix[] = getChunk(1, 10);
}

// почистим сив от случайных дублей; и переопределяем ключи массива
$matrix = array_values(
    getUniqArray($matrix)
);

/*$matrix = [
    [1, 5],
    [2, 4],
    [2, 6],
    [7, 8]
];*/

/*
$matrix = [
    [1, 8],
    [1, 1],
    [1, 2],
    [0, 2]
];
*/
//

$chunks = count($matrix);

for ($i = 0; $i < $chunks; $i++) {

    $chunkMain = $matrix[$i];
    $chunkKey  = "{$chunkMain[0]}, {$chunkMain[1]}";

    for ($j = 0; $j < $chunks; $j++) {
        $chunk = $matrix[$j];

        // не сравниваем ли сами с собой?
        if ($chunkMain[0] != $chunk[0] || $chunkMain[1] != $chunk[1]) {
            // отрезок помещается внутрь
            if ($chunkMain[0] >= $chunk[0] && $chunkMain[1] <= $chunk[1]) {
                $result[$chunkKey][] = "{$chunk[0]}, {$chunk[1]}";
            }
        }
    }
}

//

printMatrix($matrix);

// считаем и выводим результаты
foreach ($matrix as $chunk) {
    $chunkKey = "{$chunk[0]}, {$chunk[1]}";

    if (isset($result[$chunkKey])) {
        prLog("[{$chunkKey}] полностью входит в другие отрезки ". count($result[$chunkKey]) ." р. -> ". implode(' + ', $result[$chunkKey]));
    } else {
        prLog("[{$chunkKey}] не входит полностью в другие отрезки");
    }
}
