<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByEmail;

use App\Adapters\Http\Actions\Controller;
use App\Adapters\Providers\RouteServiceProvider;
use App\Adapters\Http\Requests\Auth\ByEmail\SignInByEmailRequest;
use App\Entities\User\User;
use App\UseCases\Auth\FindAuthEmailCodeByUserIdQuery;
use Illuminate\Http\RedirectResponse;

final class AuthByEmailConfirmAction extends Controller
{
    public function __invoke(SignInByEmailRequest $request): RedirectResponse
    {
        // TODO: вынести в middleware
        if ($request->isTooManyAttempts()) {
            return redirect()->back()->withErrors([
                'too_many_attempts' => 'Исчерпан лимит попыток авторизации. Попробуйте позднее',
            ]);
        }

        $phone = clear_phone($request->input('phoneFormatted'));
        $user = User::findByPhone($phone);
        if (is_null($user)) {
            return redirect()->back()->withErrors([
                'not_exists_user_with_such_phone' => 'Не существует пользователя с таким номером телефона'
            ]);
        }

        $authSendEmailCode = FindAuthEmailCodeByUserIdQuery::handle($user->id);
        if (is_null($authSendEmailCode)) {
            return redirect()->back()->withErrors([
                'not_exists_valid_auth_email_code_for_user' => 'Отсутствует валидный код для пользователя с таким email'
            ]);
        }

        if ($authSendEmailCode->id !== $request->input('emailCode')['id']) {
            return redirect()->back()->withErrors([
                'wrong_auth_email_code_id' => 'Неверный идентификатор кода подтверждения',
            ]);
        }

        if ($authSendEmailCode->code !== $request->input('emailCode')['code']) {
            return redirect()->back()->withErrors([
                'wrong_auth_email_code' => 'Неверный код подтверждения'
            ]);
        }

        $request->clearThrottleKey();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
