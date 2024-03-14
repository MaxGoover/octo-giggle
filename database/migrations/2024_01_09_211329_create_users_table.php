<?php

use App\Adapters\Helpers\User\UserHelper;
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
        Schema::create(UserHelper::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string(UserHelper::EMAIL, 50)->nullable()->unique();
            $table->string(UserHelper::FIRST_NAME, 50)->nullable();
            $table->string(UserHelper::LAST_NAME, 50)->nullable();
            $table->string(UserHelper::PHONE, 10)->nullable()->unique();
            $table->string(UserHelper::PASSWORD)->nullable();
            $table->boolean(UserHelper::OWNER)->default(false);
            $table->rememberToken();
            $table->timestamp(UserHelper::EMAIL_VERIFIED_AT)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(UserHelper::TABLE_NAME);
    }
};
