<?php

namespace Database\Seeders;

use App\Entities\Product\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    protected $processingStages = [
        [
            'codename' => 'home',
            'name' => 'Дом и сад',
        ],
        [
            'codename' => 'clothes',
            'name' => 'Одежда и обувь',
        ],
        [
            'codename' => 'electronic',
            'name' => 'Электроника',
        ],
        [
            'codename' => 'children`s',
            'name' => 'Детские товары',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->processingStages as $stage) {
            ProductCategory::firstOrCreate($stage);
        }
    }
}
