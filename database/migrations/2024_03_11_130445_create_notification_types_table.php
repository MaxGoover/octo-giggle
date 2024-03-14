<?php

use App\Adapters\Helpers\Notification\NotificationTypeHelper;
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
        Schema::create(NotificationTypeHelper::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string(NotificationTypeHelper::CODENAME);
            $table->string(NotificationTypeHelper::NAME);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(NotificationTypeHelper::TABLE_NAME);
    }
};
