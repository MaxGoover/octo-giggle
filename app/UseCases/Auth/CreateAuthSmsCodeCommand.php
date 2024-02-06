<?php

declare(strict_types=1);

namespace App\UseCases\Auth;

use App\Entities\AuthSmsCode;

final class CreateAuthSmsCodeCommand
{
    public static function handle(int $userId): AuthSmsCode
    {
        AuthSmsCode::deactivateAllByUserId($userId);

        return AuthSmsCode::create([
            'code' => AuthSmsCode::generateNumber(),
            'user_id' => $userId,
        ]);
    }
}
