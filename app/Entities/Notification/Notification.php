<?php

declare(strict_types=1);

namespace App\Entities\Notification;

use App\Adapters\Helpers\Notification\NotificationHelper;
use App\Adapters\Helpers\Notification\NotificationUserHelper;
use App\Entities\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    protected $table = NotificationHelper::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        NotificationHelper::TYPE_ID,
        NotificationHelper::TEXT,
        NotificationHelper::PAYLOAD,
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        NotificationHelper::PAYLOAD => 'array',
    ];

    /** Relations */

    final function users()
    {
        return $this
            ->belongsToMany(User::class)
            ->withTrashed()
            ->withTimestamps()
            ->withPivot([NotificationUserHelper::IS_RED]);
    }
}
