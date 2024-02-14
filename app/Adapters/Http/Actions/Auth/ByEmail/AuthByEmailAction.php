<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\ByEmail;

use App\Adapters\Http\Actions\Controller;
use Inertia\Inertia;

final class AuthByEmailAction extends Controller
{
    public function __invoke()
    {
        return Inertia::render('desktop/views/auth/byEmail/DesktopPageAuthByEmailForm');
    }
}
