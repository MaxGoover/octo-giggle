<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByPassword;

use App\Adapters\Http\Actions\Controller;

final class AuthByPasswordFormAction extends Controller
{
    public function __invoke()
    {
        return Inertia('desktop/views/auth/DesktopPageAuthByPasswordForm');
    }
}
