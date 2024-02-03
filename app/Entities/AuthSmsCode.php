<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AuthSmsCode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'code',
        'active',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /** Relations */

    final function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Scopes */

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /** Accessors/Mutators */

    public static function findActiveByUserId(int $userId): ?self
    {
        return self::active()->where('user_id', $userId)->first();
    }

    /** Logic */

    public static function generate(): string
    {
        return (string)mt_rand(config('auth.sms_code.min_number'), config('auth.sms_code.max_number'));
    }

    public function isExpired(): bool
    {
        $dateExpiration = Carbon::parse($this->created_at)
            ->addSeconds(config('auth.sms_code.timeout'));
        return $dateExpiration < Carbon::now();
    }
}
