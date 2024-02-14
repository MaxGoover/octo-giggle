<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByPhone;

use App\Adapters\Http\Actions\Controller;
use Inertia\Inertia;

final class AuthByPhoneAction extends Controller
{
    public function __invoke()
    {
        return Inertia::render('desktop/views/auth/DesktopPageAuthByPhoneForm');
    }
}
