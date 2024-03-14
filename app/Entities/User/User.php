<?php

declare(strict_types=1);

namespace App\Entities\User;

use App\Adapters\Helpers\Notification\NotificationUserHelper;
use App\Adapters\Helpers\User\UserHelper;
use App\Entities\Auth\AuthEmailCode;
use App\Entities\Notification\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = UserHelper::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        UserHelper::EMAIL,
        UserHelper::FIRST_NAME,
        UserHelper::LAST_NAME,
        UserHelper::PASSWORD,
        UserHelper::PHONE,
    ];

    protected $guarded = [
        UserHelper::OWNER,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        UserHelper::PASSWORD,
        UserHelper::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'deleted_at',
        UserHelper::EMAIL_VERIFIED_AT,
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        UserHelper::EMAIL_VERIFIED_AT => 'datetime',
        UserHelper::OWNER => 'boolean',
    ];

    /** Relations */

    final function authEmailCodes()
    {
        return $this->hasMany(AuthEmailCode::class);
    }

    final function notifications()
    {
        return $this
            ->belongsToMany(Notification::class)
            ->withTimestamps()
            ->withPivot([NotificationUserHelper::IS_RED, 'created_at']);
    }

    /** Scopes */

    public function scopePhone($query, string $phone)
    {
        return $query->where(UserHelper::PHONE, 'like', '%' . $phone . '%');
    }

    /** Accessors/Mutators */

    public function getNameAttribute(): string
    {
        return mb_trim($this->last_name . ' ' . $this->first_name);
    }

    public function getNameInitialsAttribute(): string
    {
        return Str::upper(mb_substr($this->last_name, 0, 1) . mb_substr($this->first_name, 0, 1));
    }

    public function getPhoneFormattedAttribute(): string
    {
        return format_phone($this->phone);
    }
}
