<?php

declare(strict_types=1);

namespace App\UseCases\Auth\SendSmsCode;

use App\Entities\AuthSmsCode;
use App\Entities\User;
use Exception;

final class QueryHandler
{
    public function handle(Query $query)
    {
        if (!$user = User::findActiveByPhone($query->phone)) {
            throw new Exception('Не удалось получить пользователя с таким номером телефона');
        }

        $smsCode = AuthSmsCode::findActiveByUserId($user->id);
        if (!$smsCode->isExpired()) {
            throw new Exception('Смс-код для авторизации уже был выслан');
        }

        return AuthSmsCode::generate();
    }
}
