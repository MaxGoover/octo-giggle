<?php

declare(strict_types=1);

namespace App\Entities\User;

use App\Adapters\Helpers\User\UserHelper;

final class UserRepository
{
    public static function findByEmail(string $email): ?User
    {
        return User::where(UserHelper::EMAIL, $email)
            ->whereNotNull(UserHelper::EMAIL_VERIFIED_AT)
            ->first();
    }

    public static function findById(int $id): ?User
    {
        return User::firstWhere('id', $id);
    }

    public static function findByPhone(string $phone): ?User
    {
        return User::firstWhere(UserHelper::PHONE, $phone);
    }
}
