<?php

declare(strict_types=1);

namespace App\Entities\Product;

use App\Adapters\Helpers\Product\ProductHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = ProductHelper::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        ProductHelper::AMOUNT,
        ProductHelper::ARTICLE,
        ProductHelper::CATEGORY_ID,
        ProductHelper::DESCRIPTION,
        ProductHelper::NAME,
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at',
    ];

    /** Relations */

    final function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
