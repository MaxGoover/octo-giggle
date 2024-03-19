<?php

declare(strict_types=1);

namespace App\Adapters\Helpers\Auth;

final class AuthEmailCodeHelper
{
    const TABLE_NAME = 'auth_email_codes';

    const ACTIVE = 'active';
    const CODE = 'code';
    const USER_ID = 'user_id';

    const LIST_FIELDS = [
        self::ACTIVE,
        self::CODE,
        self::USER_ID,
    ];

    public static function generateNumber(): int
    {
        return mt_rand(config('auth.email_code.between.min'), config('auth.email_code.between.max'));
    }
}
