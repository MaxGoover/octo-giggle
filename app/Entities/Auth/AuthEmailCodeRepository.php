<?php

declare(strict_types=1);

namespace App\Entities\Auth;

use App\Adapters\Helpers\Notification\AuthEmailCodeHelper;

final class AuthEmailCodeRepository
{
    public static function create(int $userId): AuthEmailCode {
        return AuthEmailCode::create([
            'code'    => AuthEmailCodeHelper::generateNumber(),
            'user_id' => $userId,
        ]);
    }

    public static function deactivateAllByUserId(int $userId): void
    {
        AuthEmailCode::active()
            ->where(AuthEmailCodeHelper::USER_ID, $userId)
            ->update([AuthEmailCodeHelper::ACTIVE => false]);
    }

    public static function findActiveByUserId(int $userId): ?AuthEmailCode
    {
        return AuthEmailCode::active()
            ->where(AuthEmailCodeHelper::USER_ID, $userId)->first();
    }
}
