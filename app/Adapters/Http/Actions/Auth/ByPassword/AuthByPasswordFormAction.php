<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByPassword;

use App\Adapters\Http\Actions\Action;

final class AuthByPasswordFormAction extends Action
{
    public function __invoke()
    {
        return Inertia('desktop/views/auth/DesktopPageAuthByPasswordForm');
    }
}
