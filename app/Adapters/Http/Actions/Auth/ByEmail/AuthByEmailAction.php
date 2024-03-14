<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByEmail;

use App\Adapters\Http\Actions\Controller;

final class AuthByEmailAction extends Controller
{
    public function __invoke()
    {
        return inertia('desktop/views/auth/byEmail/DesktopPageAuthByEmailForm');
    }
}
