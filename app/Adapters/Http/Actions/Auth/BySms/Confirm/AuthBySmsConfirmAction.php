<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\BySms\Confirm;

use App\Adapters\Http\Actions\Controller;
use App\UseCases\Auth\FindAuthSmsCodeQuery;
use App\UseCases\User\UserCreateCommand;
use Illuminate\Support\Facades\Request;

final class AuthBySmsConfirmAction extends Controller
{
    public function __invoke()
    {
        Request::validate([
            'phoneFormatted' => 'required|string|max:' . config('validation.phone.max_length'),
        ]);

        $phone = clear_phone(Request::get('phoneFormatted'));

        (new UserCreateCommand($phone))->handle();
        $authSendSmsCode = (new FindAuthSmsCodeQuery())->handle($phone);
        if (is_empty($authSendSmsCode)) {

        }

        return Inertia('desktop/views/auth/bySms/DesktopPageAuthBySmsConfirm', [
            'phoneFormatted' => format_phone($phone),
            'smsCode' => $authSendSmsCode->code,
            'smsCodeTimeout' => $authSendSmsCode->timeout(),
        ]);
    }
}
