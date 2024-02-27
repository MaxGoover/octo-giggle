<?php

use App\Adapters\Helpers\Product\ProductCategoryHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(ProductCategoryHelper::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string(ProductCategoryHelper::CODENAME, 25);
            $table->string(ProductCategoryHelper::NAME, 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ProductCategoryHelper::TABLE_NAME);
    }
};
