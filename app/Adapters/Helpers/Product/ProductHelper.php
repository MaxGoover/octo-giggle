<?php

declare(strict_types=1);

namespace App\Adapters\Helpers\Product;

final class ProductHelper
{
    const TABLE_NAME = 'products';

    const AMOUNT = 'amount';
    const ARTICLE = 'article';
    const CATEGORY_ID = 'category_id';
    const DESCRIPTION = 'description';
    const NAME = 'name';

    const LIST_FIELDS = [
        self::AMOUNT,
        self::ARTICLE,
        self::CATEGORY_ID,
        self::DESCRIPTION,
        self::NAME,
    ];
}
