<?php

use App\Adapters\Helpers\Notification\NotificationHelper;
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
        Schema::create(NotificationHelper::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(NotificationHelper::TYPE_ID);
            $table->text(NotificationHelper::TEXT);
            $table->json(NotificationHelper::PAYLOAD)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(NotificationHelper::TYPE_ID)
                ->references('id')
                ->on(NotificationTypeHelper::TABLE_NAME)
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(NotificationHelper::TABLE_NAME);
    }
};
