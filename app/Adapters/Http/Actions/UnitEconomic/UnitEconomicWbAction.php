<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\UnitEconomic;

use App\Adapters\Http\Actions\Controller;

final class UnitEconomicWbAction extends Controller
{
    public function handle()
    {
        return inertia('desktop/views/unitEconomic/DesktopPageUnitEconomicWb');
    }
}
