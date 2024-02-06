<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Entities\User;

final class UserCreateCommand
{
    public static function handle(string $phone): User
    {
        return User::create([
            'app_version' => config('app.version'),
            'api_token' => User::generateToken(),
            'phone' => $phone,
        ]);
    }
}
