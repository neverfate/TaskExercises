<?php

/**
 * Рекурсивное вычисление НОД по бинарному алгоритму (больший Общий Делитель)
 * @param int $_a
 * @param int $_b
 * @return int
 */
function getNOD(int $_a, int $_b): int
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
