<?php

declare(strict_types=1);

namespace App\Adapters\Http\Axios\Products;

use App\Entities\Product\ProductCategory;
use Illuminate\Http\JsonResponse;

final class GetProductCategoriesAxios
{
    public function __invoke(): JsonResponse
    {
        return response()->json(['productCategories' => ProductCategory::all()], 200);
    }
}
