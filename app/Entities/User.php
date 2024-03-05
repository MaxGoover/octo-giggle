<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
        'phone',
    ];

    protected $guarded = [
        'owner',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'deleted_at',
        'email_verified_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'owner' => 'boolean',
    ];

    /** Relations */

    final function authEmailCodes()
    {
        return $this->hasMany(AuthEmailCode::class);
    }

    /** Scopes */

    public function scopePhone($query, string $phone)
    {
        return $query->where('phone', 'like', '%' . $phone . '%');
    }

    /** Accessors/Mutators */

    public static function findActiveById(int $id): ?self
    {
        return self::where('id', $id)->first();
    }

    public static function findActiveByPhone(string $phone): ?self
    {
        return self::where('phone', $phone)->first();
    }

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

    /** Logic */

    public static function isDeletedByPhone($phone): bool
    {
        return self::onlyTrashed()->where('phone', $phone)->exists();
    }

    public function generateToken(): string
    {
        $token = null;
        do {
            $token = Str::random(config('settings.user.api_token_length'));
        } while ($this->where('api_token', $token)->exists());

        return hash('sha256', $token);
    }

    public function forgetToken()
    {
        $this->update(['api_token' => null]);
    }

    public function refreshToken()
    {
        $this->update(['api_token' => $this->generateToken()]);
    }
}
