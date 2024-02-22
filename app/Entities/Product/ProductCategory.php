<?php

namespace App\Entities\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codename',
        'name',
    ];

    /** Relations */

    final function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
