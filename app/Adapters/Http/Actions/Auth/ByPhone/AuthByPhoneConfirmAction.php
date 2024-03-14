<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByPhone;

use App\Adapters\Http\Actions\Controller;
use App\Adapters\Providers\RouteServiceProvider;
use App\Adapters\Http\Requests\Auth\SignInByPhoneRequest;
use App\Entities\User\UserRepository;
use App\UseCases\User\CreateUserCommand;
use Illuminate\Http\RedirectResponse;

final class AuthByPhoneConfirmAction extends Controller
{
    public function __invoke(SignInByPhoneRequest $request): RedirectResponse
    {
        // TODO: вынести в middleware
        if ($request->isTooManyAttempts()) {
            return redirect()->back()->withErrors([
                'too_many_attempts' => 'Исчерпан лимит попыток авторизации. Попробуйте позднее',
            ]);
        }

        $phone = clear_phone($request->input('phoneFormatted'));
        $password = $request->input('password');
        $user = UserRepository::findByPhone($phone);
        if (is_null($user)) {
            // $user = CreateUserCommand::handle($phone, $password);

            return redirect()->back()->withErrors([
                'not_exists_user_with_such_phone' => 'Не существует пользователя с таким номером телефона'
            ]);
        }

        $isAuthorized = auth()->attempt(['phone' => $phone, 'password' => $password], false);
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
