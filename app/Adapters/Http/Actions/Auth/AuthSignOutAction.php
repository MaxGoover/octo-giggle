<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Auth;

use App\Adapters\Http\Actions\Controller;
use App\Adapters\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

final class AuthSignOutAction extends Controller
{
    public function handle(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect('/');
    }
}
