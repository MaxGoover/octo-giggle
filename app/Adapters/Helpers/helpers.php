<?php

if (!function_exists('escape_search')) {
    /**
     * Отфильтровывает строку от ненужных символов для поиска.
     * @param string $search
     * @return string
     */
    function escape_search(string $search): string
    {
        $filteredSearch = trim(str_replace(['+', '-', '<', '>', '(', ')', '~', '*', '@'], '', $search));

        return addcslashes(escape_double_quotes_except_one($filteredSearch), '"');
    }
}

if (!function_exists('format_phone')) {
    /**
     * Отфильтровывает номер телефона (или ИНН) от лишних символов и чисел для поиска.
     * Например: '+7 (961) 854-98-05' -> '9618549805'
     *           '8-900-123-45-67' -> '9001234567'
     * @param $phone
     * @return string
     */
    function format_phone($phone): string
    {
        if (!is_string($phone)) {
            return '';
        }

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

if (!function_exists('phone_format')) {
    function phone_format($number, $prefix = '')
    {
        if (ctype_digit($number) && strlen($number) === 10) {
            return $prefix . ' (' . substr($number, 0, 3) . ') ' . substr($number, 3, 3) . '-' . substr($number, 6, 2) . '-' . substr($number, 8, 2);
        } else if (ctype_digit($number) && strlen($number) === 7) {
            return $prefix . ' (' . substr($number, 0, 3) . ') ' . substr($number, 3, 4);
        }

        return $number;
    }
}

