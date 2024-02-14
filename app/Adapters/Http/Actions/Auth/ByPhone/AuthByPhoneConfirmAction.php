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

final class AuthByPhoneConfirmAction extends Controller
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
            return Redirect::back()->withErrors([
                'not_exists_user_with_such_phone' => 'Не существует пользователя с таким номером телефона'
            ]);
        }

        $isAuthorized = Auth::attempt(['phone' => $phone, 'password' => $password], false);
        if (!$isAuthorized) {
            return Redirect::back()->withErrors([
                'authorization_error' => 'Ошибка авторизации',
            ]);
        }

        $request->clearThrottleKey();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
