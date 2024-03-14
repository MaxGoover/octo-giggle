<?php

declare(strict_types=1);

namespace App\UseCases\Auth;

use App\Entities\Auth\AuthEmailCode;
use App\Entities\Auth\AuthEmailCodeRepository;

final class FindAuthEmailCodeByUserIdQuery
{
    public static function handle(int $userId): ?AuthEmailCode
    {
        $authEmailCode = AuthEmailCodeRepository::findActiveByUserId($userId);
        if (optional($authEmailCode)->isExpiredTimeout()) {
            return null;
        }

        return $authEmailCode;
    }
}
