<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\UnitEconomic;

use App\Adapters\Http\Actions\Controller;
use Inertia\Inertia;

final class UnitEconomicWbAction extends Controller
{
    public function handle()
    {
        return Inertia::render('desktop/views/unitEconomic/DesktopPageUnitEconomicWb');
    }
}
