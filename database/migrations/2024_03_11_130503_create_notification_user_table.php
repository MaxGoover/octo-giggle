<?php

use App\Adapters\Helpers\Notification\NotificationHelper;
use App\Adapters\Helpers\Notification\NotificationUserHelper;
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
        Schema::create(NotificationUserHelper::TABLE_NAME, function (Blueprint $table) {
            $table->unsignedBigInteger(NotificationUserHelper::NOTIFICATION_ID);
            $table->unsignedInteger(NotificationUserHelper::USER_ID);
            $table->boolean('is_red')->default(0);
            $table->timestamps();

            $table->foreign(NotificationUserHelper::NOTIFICATION_ID)
                ->references('id')
                ->on(NotificationHelper::TABLE_NAME)
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(NotificationUserHelper::USER_ID)
                ->references('id')
                ->on(UserHelper::TABLE_NAME)
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(NotificationUserHelper::TABLE_NAME);
    }
};
