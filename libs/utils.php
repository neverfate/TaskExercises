<?php

/**
 * Пишет строку в консоль
 * @param string $_sameTxt
 */
function prLog(string $_sameTxt = ''): void
{
    echo "{$_sameTxt}\n";
}// prLog

////////////////////////////////////////////////////////////////////////////////

/**
 * Определение четности числа
 * @param int $_n
 * @return bool
 */
function isEven(int $_n): bool
{
    return !($_n & 1);
}// isEven

////////////////////////////////////////////////////////////////////////////////

/**
 * Инициализация случайных чисел
 * @param int $_seed
 */
function randInit(int $_seed = 1000000): void
{
    mt_srand(microtime(true) * $_seed);
}// randInit

////////////////////////////////////////////////////////////////////////////////

/**
 * Очищает многомерный от полных дублей: [0 => [1,2,3], 1 => [1,2,3]]
 * @param array $_a
 * @return array
 */
function getUniqArray(array $_a): array
{
    return array_map(
        'unserialize',
        array_unique(
            array_map('serialize', $_a)
        )
    );
}// getUniqArray
