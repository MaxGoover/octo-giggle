<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Dashboard;

use App\Adapters\Http\Actions\Controller;

final class DashboardAction extends Controller
{
    public function __invoke()
    {
        return inertia('desktop/views/DesktopPageDashboard');
    }
}
