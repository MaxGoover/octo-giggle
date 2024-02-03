<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth\BySms\Confirm;

use App\Adapters\Http\Actions\Action;

final class AuthBySmsConfirmRequest extends Action
{
    public function __invoke()
    {
        return Inertia('desktop/views/DesktopPageAuth');
    }
}
