<?php

return [
    'auth' => [
        'email' => 'required|string|email',
        'email_code' => [
            'id' => 'required|integer',
            'code' => 'required|integer|min:' . config('auth.email_code.number.min') . '|max:' . config('auth.email_code.number.max'),
        ],
        'password' => 'required|string|min:' . config('auth.password.length.min') . '|max:' . config('auth.password.length.max'),
    ],
    'phone' => [
        'max_length' => 20,
    ],
    'product' => [
        // вынести названия полей в константы хелпера
        'category_id' => 'required|integer',
        'article' => 'required|string',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'amount' => 'required|integer',
    ],
];
