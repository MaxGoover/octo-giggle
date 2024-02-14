<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByEmail;

use App\Adapters\Http\Actions\Controller;
use App\Adapters\Providers\RouteServiceProvider;
use App\Adapters\Http\Requests\Auth\SignInByEmailRequest;
use App\UseCases\Auth\FindAuthEmailCodeByUserIdQuery;
use App\UseCases\User\FindUserByPhoneQuery;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

final class AuthByEmailConfirmAction extends Controller
{
    public function __invoke(SignInByEmailRequest $request)
    {
        if ($request->isTooManyAttempts()) {
            return Redirect::back()->withErrors([
                'too_many_attempts' => 'Исчерпан лимит попыток авторизации. Попробуйте позднее',
            ]);
        }

        $phone = clear_phone(Request::get('phoneFormatted'));
        $user = FindUserByPhoneQuery::handle($phone);
        if (is_null($user)) {
            return Redirect::back()->withErrors([
                'not_exists_user_with_such_phone' => 'Не существует пользователя с таким номером телефона'
            ]);
        }

        $authSendEmailCode = FindAuthEmailCodeByUserIdQuery::handle($user->id);
        if (is_null($authSendEmailCode)) {
            return Redirect::back()->withErrors([
                'not_exists_valid_auth_email_code_for_user' => 'Отсутствует валидный смс-код для пользователя с таким номером телефона'
            ]);
        }

        if ($authSendEmailCode->id !== Request::get('emailCode')['id']) {
            return Redirect::back()->withErrors([
                'wrong_auth_email_code_id' => 'Неверный идентификатор смс-кода',
            ]);
        }

        if ($authSendEmailCode->code !== Request::get('emailCode')['code']) {
            return Redirect::back()->withErrors([
                'wrong_auth_email_code' => 'Неверный смс-код'
            ]);
        }

        $request->clearThrottleKey();
        $user->refreshToken();
        $request->session()->regenerate();

        return Redirect::intended(RouteServiceProvider::HOME);
        // return Redirect::intended(RouteServiceProvider::HOME);
        // return redirect()->intended(RouteServiceProvider::HOME);
        // return Redirect::route('home');
    }
}
