<?php

declare(strict_types=1);

namespace App\Adapters\Helpers\Product;

final class ProductCategoryHelper
{
    const TABLE_NAME = 'product_categories';

    const CODENAME = 'codename';
    const NAME = 'name';

    const LIST_FIELDS = [
        self::CODENAME,
        self::NAME,
    ];
}
