<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AuthEmailCode extends Model
{
    protected $table = 'auth_email_codes';

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

    public static function deactivateAllByUserId(int $userId): void
    {
        self::active()->where('user_id', $userId)
            ->update([
                'active' => false,
            ]);
    }

    public static function findActiveByUserId(int $userId): ?self
    {
        return self::active()->where('user_id', $userId)->first();
    }

    /** Logic */

    public static function generateNumber(): int
    {
        return mt_rand(config('validation.email_code.min_number'), config('validation.email_code.max_number'));
    }

    public function isExpiredTimeout(): bool
    {
        $dateExpiration = Carbon::parse($this->created_at)
            ->addSeconds(config('auth.email_code.timeout'));
        return $dateExpiration < Carbon::now();
    }

    public function timeout(): int
    {
        $created_at = Carbon::parse($this->created_at);
        return config('auth.email_code.timeout') - $created_at->diffInSeconds(Carbon::now());
    }
}
