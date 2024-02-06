<?php

declare(strict_types=1);

namespace App\UseCases\Auth;

use App\Entities\AuthSmsCode;

final class FindAuthSmsCodeByUserIdQuery
{
    public static function handle(int $userId): ?AuthSmsCode
    {
        $authSmsCode = AuthSmsCode::findActiveByUserId($userId);
        if (optional($authSmsCode)->isExpired()) {
            return null;
        }

        return $authSmsCode;
    }
}
