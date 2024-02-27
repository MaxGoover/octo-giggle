<?php

namespace App\Entities\Product;

use App\Adapters\Helpers\Product\ProductCategoryHelper;
use App\Adapters\Helpers\Product\ProductHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = ProductCategoryHelper::TABLE_NAME;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        ProductCategoryHelper::CODENAME,
        ProductCategoryHelper::NAME,
    ];

    /** Relations */

    final function products()
    {
        return $this->hasMany(Product::class, ProductHelper::CATEGORY_ID, 'id');
    }
}
