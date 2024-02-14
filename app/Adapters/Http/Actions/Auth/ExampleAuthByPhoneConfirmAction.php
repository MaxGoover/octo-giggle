<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByPhone;

use App\Adapters\Http\Actions\Controller;
use App\Adapters\Providers\RouteServiceProvider;
use App\Adapters\Http\Requests\Auth\SignInByPhoneRequest;
use App\UseCases\Auth\CreateAuthEmailCodeCommand;
use App\UseCases\Auth\FindAuthEmailCodeByUserIdQuery;
use App\UseCases\User\CreateUserCommand;
use App\UseCases\User\FindUserByPhoneQuery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

final class ExampleAuthByPhoneConfirmAction extends Controller
{
    public function __invoke(SignInByPhoneRequest $request)
    {
        if ($request->isTooManyAttempts()) {
            return Redirect::back()->withErrors([
                'too_many_attempts' => 'Исчерпан лимит попыток авторизации. Попробуйте позднее',
            ]);
        }

        $phone = clear_phone(Request::get('phoneFormatted'));
        $password = Request::get('password');
        $user = FindUserByPhoneQuery::handle($phone);
        if (is_null($user)) {
            // $user = CreateUserCommand::handle($phone, $password);

            return Redirect::back()->withErrors([
                'not_exists_user_with_such_phone' => 'Не существует пользователя с таким номером телефона'
            ]);
        }

        // $authEmailCode = FindAuthEmailCodeByUserIdQuery::handle($user->id);
        // if (is_null($authEmailCode)) {
        //     $authEmailCode = CreateAuthEmailCodeCommand::handle($user->id);

        // return Redirect::back()->withErrors([
        //     'not_exists_valid_auth_email_code_for_user' => 'Отсутствует валидный код подтверждения для пользователя с таким номером телефона'
        // ]);
        // }

        // if ($authEmailCode->id !== Request::get('emailCode')['id']) {
        //     return Redirect::back()->withErrors([
        //         'wrong_auth_email_code_id' => 'Неверный идентификатор кода подтверждения',
        //     ]);
        // }

        // if ($authEmailCode->code !== Request::get('emailCode')['code']) {
        //     return Redirect::back()->withErrors([
        //         'wrong_auth_email_code' => 'Неверный код подтверждения'
        //     ]);
        // }

        Auth::attempt(['phone' => $phone, 'password' => $password], false);
        $request->clearThrottleKey();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
