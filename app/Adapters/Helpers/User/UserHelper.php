<?php

declare(strict_types=1);

namespace App\Adapters\Helpers\User;

final class UserHelper
{
    const TABLE_NAME = 'users';

    const EMAIL = 'email';
    const EMAIL_VERIFIED_AT = 'email_verified_at';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const OWNER = 'owner';
    const PASSWORD = 'password';
    const PHONE = 'phone';
    const REMEMBER_TOKEN = 'remember_token';

    const LIST_FIELDS = [
        self::EMAIL,
        self::EMAIL_VERIFIED_AT,
        self::FIRST_NAME,
        self::OWNER,
        self::PASSWORD,
        self::PHONE,
        self::REMEMBER_TOKEN,
    ];
}
