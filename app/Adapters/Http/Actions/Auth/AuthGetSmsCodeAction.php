<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\BySms\Confirm;

use App\Adapters\Http\Actions\Controller;
use App\UseCases\Auth\CreateAuthSmsCodeCommand;
use App\UseCases\Auth\FindAuthSmsCodeByUserIdQuery;
use App\UseCases\User\FindUserByPhoneQuery;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

final class AuthGetSmsCodeAction extends Controller
{
    public function __invoke()
    {
        Request::validate([
            'phoneFormatted' => 'required|string|max:' . config('validation.phone.max_length'),
        ]);

        $phone = clear_phone(Request::get('phoneFormatted'));

        $user = FindUserByPhoneQuery::handle($phone);
        if (is_empty($user)) {
            return Redirect::back()->with('error', 'Пользователь с таким номером телефона не существует');
        }

        $authSendSmsCode = FindAuthSmsCodeByUserIdQuery::handle($user->id);
        if (is_empty($authSendSmsCode)) {
            CreateAuthSmsCodeCommand::handle($user->id);
        }

        return Redirect::back()->with('success', [
            'phoneFormatted' => format_phone($phone),
            'smsCode' => [
                'id' => $authSendSmsCode->id,
                'code' => $authSendSmsCode->code,
                'timeout' => $authSendSmsCode->timeout(),
            ],
        ]);
    }
}
