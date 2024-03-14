<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth;

use App\Adapters\Http\Actions\Controller;
use App\Adapters\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

final class AuthSignOutAction extends Controller
{
    public function handle(Request $request)
    {
        auth()->guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
