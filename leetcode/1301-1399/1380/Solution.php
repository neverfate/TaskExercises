<?php

/*
1380. Lucky Numbers in a Matrix => Copy od /Tasks/1-99/7/task.php

https://leetcode.com/submissions/detail/533159177/

Given a m * n matrix of distinct numbers, return all lucky numbers in the matrix in any order.

A lucky number is an element of the matrix such that it is the minimum element in its row and maximum in its column.



Example 1:

Input: matrix = [[3,7,8],[9,11,13],[15,16,17]]
Output: [15]
Explanation: 15 is the only lucky number since it is the minimum in its row and the maximum in its column
Example 2:

Input: matrix = [[1,10,4,2],[9,3,8,7],[15,16,17,12]]
Output: [12]
Explanation: 12 is the only lucky number since it is the minimum in its row and the maximum in its column.
Example 3:

Input: matrix = [[7,8],[1,2]]
Output: [7]


Constraints:

m == mat.length
n == mat[i].length
1 <= n, m <= 50
1 <= matrix[i][j] <= 10^5.
All elements in the matrix are distinct.
    */

class Solution
{
    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function luckyNumbers($matrix): array
    {
        $data  =
        $sedlo = [];

        // найдем все минимумы в строках
        foreach ($matrix as $vector) {

            $j   = 0;          // индекс в строке минимального значения
            $min = $vector[0];


            for ($i = 1; $i < count($vector); $i++) {
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

            for ($i = 0; $i < count($matrix); $i++) {
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

        return $sedlo;
    }
}
