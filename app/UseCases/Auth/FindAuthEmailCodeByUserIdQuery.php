<?php

declare(strict_types=1);

namespace App\UseCases\Auth;

use App\Entities\AuthEmailCode;

final class FindAuthEmailCodeByUserIdQuery
{
    public static function handle(int $userId): ?AuthEmailCode
    {
        $authEmailCode = AuthEmailCode::findActiveByUserId($userId);
        if (optional($authEmailCode)->isExpiredTimeout()) {
            return null;
        }

        return $authEmailCode;
    }
}
