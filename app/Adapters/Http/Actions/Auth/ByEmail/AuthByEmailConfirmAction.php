<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByEmail;

use App\Adapters\Helpers\Auth\AuthEmailCodeHelper;
use App\Adapters\Helpers\User\UserHelper;
use App\Adapters\Http\Actions\Controller;
use App\Adapters\Providers\RouteServiceProvider;
use App\Adapters\Http\Requests\Auth\ByEmail\SignInByEmailRequest;
use App\Entities\User\User;
use App\Entities\User\UserRepository;
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

        $email = $request->input(UserHelper::EMAIL);
        $user = UserRepository::findByEmail($email);
        if (is_null($user)) {
            return redirect()->back()->withErrors([
                'find_user_by_email' => 'Пользователя с таким email не существует'
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

        $isAuthorized = auth()->loginUsingId($user->id);
        if (!$isAuthorized) {
            return redirect()->back()->withErrors([
                'authorization_error' => 'Ошибка авторизации',
            ]);
        }

        $request->clearThrottleKey();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
