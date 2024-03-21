<?php

return [
    'auth' => [
        'email_code' => [
            'expires' => 3600, // (сек)
            'timeout' => 30, // (сек)
        ],
    ],
    'notification' => [
        'pagination' => [
            'rowsPerPage' => 10,
        ],
    ],
    'product' => [
        'csvStorage' => [
            'url' => [
                'store' => '/products/csv',
            ],
        ],
        'parser' => [
            'count' => [
                'firstRowsValidation' => 5, // кол-во строк, которые мы проверяем перед полной валидацией файла
            ],
        ],
    ],
    'user' => [
        'api_token_length' => 80,
    ],
];
