<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Entities\User\User;
use Illuminate\Support\Facades\Hash;

final class CreateUserCommand
{
    public static function handle(string $phone, string $password): User
    {
        return User::create([
            'password' => Hash::make($password),
            'phone'    => $phone,
        ]);
    }
}
