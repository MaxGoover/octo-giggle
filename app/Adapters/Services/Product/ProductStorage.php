<?php

declare(strict_types=1);

namespace App\Adapters\Services\Product;

use App\Adapters\Helpers\Product\ProductHelper;
use App\Entities\Product\Product;

final class ProductStorage
{
    private int $_countSavedProducts = 0;

    public function countSavedProducts()
    {
        return $this->_countSavedProducts;
    }

    public function createOrUpdate(array $products)
    {
        foreach ($products as $product) {
            if (Product::updateOrCreate([ProductHelper::ARTICLE => $product[ProductHelper::ARTICLE]], $product)) {
                $this->_countSavedProducts++;
            };
        }
    }
}
