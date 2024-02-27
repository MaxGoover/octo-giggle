<?php

use App\Adapters\Helpers\Product\ProductCategoryHelper;
use App\Adapters\Helpers\Product\ProductHelper;
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
        Schema::create(ProductHelper::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger(ProductHelper::CATEGORY_ID);
            $table->string(ProductHelper::ARTICLE, 20)->unique();
            $table->string(ProductHelper::NAME, 50);
            $table->string(ProductHelper::DESCRIPTION, 200)->nullable();
            $table->unsignedInteger(ProductHelper::AMOUNT)->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(ProductHelper::CATEGORY_ID)
                ->references('id')
                ->on(ProductCategoryHelper::TABLE_NAME)
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ProductHelper::TABLE_NAME);
    }
};
