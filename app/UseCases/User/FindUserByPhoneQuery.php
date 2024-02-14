<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Entities\User;
use Illuminate\Support\Facades\Redirect;

final class FindUserByPhoneQuery
{
    public static function handle(string $phone): ?User
    {
        if (User::isDeletedByPhone($phone)) {
            return Redirect::back()->withErrors([
                'find_user_by_phone_query' => 'Пользователь с таким номером телефона уже удален'
            ]);
        }

        return User::findActiveByPhone($phone);
    }
}
