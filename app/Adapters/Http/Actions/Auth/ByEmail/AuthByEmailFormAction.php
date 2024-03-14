<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByEmail;

use App\Adapters\Http\Actions\Controller;
use App\Adapters\Http\Requests\Auth\ByEmail\SendAuthEmailCodeRequest;
use App\Entities\User\User;
use App\Entities\User\UserRepository;
use App\UseCases\Auth\CreateAuthEmailCodeCommand;
use App\UseCases\Auth\FindAuthEmailCodeByUserIdQuery;

final class AuthByEmailFormAction extends Controller
{
    public function __invoke(SendAuthEmailCodeRequest $request)
    {
        // TODO: Проверить негативный сценарий
        $abc = $request->validate(['email' => config('validation.rules.auth.email')]);
        dd($abc);
        return redirect()->back()->withErrors([
            'abc' => $abc,
        ]);

        $email = $request->input('email');

        $user = UserRepository::findByEmail($email);
        if (is_null($user)) {
            return redirect()->back()->withErrors([
                'find_user_by_email' => 'Пользователя с таким email не существует'
            ]);
        }

        $authSendEmailCode = FindAuthEmailCodeByUserIdQuery::handle($user->id);
        if (is_null($authSendEmailCode)) {
            $authSendEmailCode = CreateAuthEmailCodeCommand::handle($user->id);
        }

        return inertia('desktop/views/auth/byEmail/DesktopPageAuthByEmailConfirm', [
            'emailCode' => [
                'id' => $authSendEmailCode->id,
                'code' => $authSendEmailCode->code,
                'timeout' => $authSendEmailCode->timeout(),
            ],
        ]);
    }
}
