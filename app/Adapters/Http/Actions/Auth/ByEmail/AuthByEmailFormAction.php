<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByEmail;

use App\Adapters\Http\Actions\Controller;
use App\UseCases\Auth\CreateAuthEmailCodeCommand;
use App\UseCases\Auth\FindAuthEmailCodeByUserIdQuery;
use App\UseCases\User\FindUserByPhoneQuery;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;


final class AuthByEmailFormAction extends Controller
{
    public function __invoke()
    {
        Request::validate([
            'phoneFormatted' => 'required|string|max:' . config('validation.phone.max_length'),
        ]);

        $phone = clear_phone(Request::get('phoneFormatted'));
        $user = FindUserByPhoneQuery::handle($phone);
        if (is_null($user)) {
            return Redirect::back()->withErrors([
                'find_user_by_phone_query' => 'Пользователя с таким номером телефона не существует'
            ]);
        }

        $authSendEmailCode = FindAuthEmailCodeByUserIdQuery::handle($user->id);
        if (is_null($authSendEmailCode)) {
            $authSendEmailCode = CreateAuthEmailCodeCommand::handle($user->id);
        }

        return Inertia::render('desktop/views/auth/byEmail/DesktopPageAuthByEmailConfirm', [
            'phoneFormatted' => format_phone($phone),
            'emailCode' => [
                'id' => $authSendEmailCode->id,
                'code' => $authSendEmailCode->code,
                'timeout' => $authSendEmailCode->timeout(),
            ],
        ]);
    }
}
