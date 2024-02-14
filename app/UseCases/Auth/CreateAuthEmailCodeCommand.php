<?php

declare(strict_types=1);

namespace App\UseCases\Auth;

use App\Entities\AuthEmailCode;

final class CreateAuthEmailCodeCommand
{
    public static function handle(int $userId): AuthEmailCode
    {
        AuthEmailCode::deactivateAllByUserId($userId);

        return AuthEmailCode::create([
            'code' => AuthEmailCode::generateNumber(),
            'user_id' => $userId,
        ]);
    }
}
