<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Dashboard;

use App\Adapters\Http\Actions\Controller;
use Inertia\Inertia;

final class DashboardAction extends Controller
{
    public function __invoke()
    {
        return Inertia::render('desktop/views/DesktopPageDashboard');
    }
}
