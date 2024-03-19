<?php

use App\Adapters\Helpers\Product\ProductHelper;

return [
    'auth' => [
        'email' => 'required|string|email',
        'email_code' => [
            'id' => 'required|integer',
            // 'code' => 'required|integer|min:' . config('auth.email_code.number.min') . '|max:' . config('auth.email_code.number.max'),
            'code' => 'required|integer',
        ],
        'password' => 'required|string|min:' . config('auth.password.length.min') . '|max:' . config('auth.password.length.max'),
    ],
    'phone' => [
        'max_length' => 20,
    ],
    'product' => [
        ProductHelper::CATEGORY_ID => 'required|integer',
        ProductHelper::ARTICLE => 'required|string',
        ProductHelper::NAME => 'required|string',
        ProductHelper::DESCRIPTION => 'nullable|string',
        ProductHelper::AMOUNT => 'required|integer',
    ],
];
