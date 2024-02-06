<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\BySms\Form;

use App\Adapters\Http\Actions\Controller;

final class AuthBySmsFormAction extends Controller
{
    public function __invoke()
    {
        return Inertia('desktop/views/auth/bySms/DesktopPageAuthBySmsForm');
    }
}
