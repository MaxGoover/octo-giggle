<?php

use function PHPUnit\Framework\isEmpty;

if (!function_exists('escape_search')) {
    /**
     * Очищает строку от ненужных символов для поиска.
     * @param string $search
     * @return string
     */
    function escape_search(string $search): string
    {
        $filteredSearch = trim(str_replace(['+', '-', '<', '>', '(', ')', '~', '*', '@'], '', $search));

        return addcslashes(escape_double_quotes_except_one($filteredSearch), '"');
    }
}

if (!function_exists('clear_phone')) {
    /**
     * Очищает номер телефона (или ИНН) от лишних символов и чисел для поиска.
     * Например: '+7 (961) 854-98-05' -> '9618549805'
     *           '8-900-123-45-67' -> '9001234567'
     * @param $phone
     * @return string
     */
    function clear_phone(string $phone): string
    {
        // Избавляемся от ненужных символов
        $filteredSearch = str_replace(['tel:', '+7', '+', '(', ')', '-', ' '], '', $phone);

        // Избавляемся от первой цифры 7 или 8, если их от семи до одиннадцати
        if (
            preg_match('/^[7,8]/', $filteredSearch)
            && mb_strlen($filteredSearch) >= 7
            && mb_strlen($filteredSearch) <= 11
        ) {
            $filteredSearch = substr_replace($filteredSearch, '', 0, 1);
        }

        return $filteredSearch;
    }
}

if (!function_exists('escape_double_quotes_except_one')) {
    /**
     * Отфильтровывает двойные кавычки ", если их больше чем одна. (Т.е. последующие - убираем, оставляем только первые)
     * Например: 'ООО "Ромашка"' -> 'ООО "Ромашка'
     * @param string $search
     * @return string
     */
    function escape_double_quotes_except_one(string $search): string
    {
        $existDoubleQuotes = false;
        $filteredSearch = [];
        foreach (mb_str_split($search) as $letter) {
            if ($letter !== '"') {
                $filteredSearch[] = $letter;
            } else if (!$existDoubleQuotes) {
                $filteredSearch[] = '"';
                $existDoubleQuotes = true;
            }
        }

        return implode($filteredSearch);
    }
}

if (!function_exists('format_phone')) {
    /**
     * Форматирует номер телефона.
     * Например: '9618549805' -> '+7 (961) 854-98-05'
     * @param $phone
     * @return string
     */
    function format_phone($phone)
    {
        return '+7 (' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6, 2) . '-' . substr($phone, 8, 2);
    }
}

if (!function_exists('is_empty')) {
    function is_empty(mixed $value) {
        return isEmpty($value);
    }
}
