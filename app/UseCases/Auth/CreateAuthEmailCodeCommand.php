<?php

declare(strict_types=1);

namespace App\UseCases\Auth;

use App\Entities\Auth\AuthEmailCode;
use App\Entities\Auth\AuthEmailCodeRepository;

final class CreateAuthEmailCodeCommand
{
    public static function handle(int $userId): AuthEmailCode
    {
        AuthEmailCodeRepository::deactivateAllByUserId($userId);

        return AuthEmailCodeRepository::create($userId);
    }
}
