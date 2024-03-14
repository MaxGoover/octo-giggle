<?php

declare(strict_types=1);

namespace App\Entities\Notification;

use App\Adapters\Helpers\Notification\NotificationTypeHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    use HasFactory;

    protected $table = NotificationTypeHelper::TABLE_NAME;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        NotificationTypeHelper::CODENAME,
        NotificationTypeHelper::NAME,
    ];
}
