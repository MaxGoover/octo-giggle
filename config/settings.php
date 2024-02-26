<?php

return [
    'auth' => [
        'email_code' => [
            'expires' => 3600, // (сек)
            'timeout' => 5, // (сек)
        ],
    ],
    'product' => [
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
