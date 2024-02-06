<?php

namespace App\Entities;

use App\Entities\AuthSmsCode;
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
        'phone',
        'active',
        'last_online',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['api_token'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_online',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /** Relations */

    final function authSmsCodes()
    {
        return $this->hasMany(AuthSmsCode::class);
    }

    /** Scopes */

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopePhone($query, string $phone)
    {
        return $query->where('phone', 'like', '%' . $phone . '%');
    }

    /** Accessors/Mutators */

    public static function findActiveById(int $id): ?self
    {
        return self::active()->where('id', $id)->first();
    }

    public static function findActiveByPhone(string $phone): ?self
    {
        return self::active()->where('phone', $phone)->first();
    }

    /** Logic */

    public static function generateToken(): string
    {
        $token = null;
        do {
            $token = Str::random(config('settings.user.api_token_length'));
        } while (self::where('api_token', $token)->exists());

        return hash('sha256', $token);
    }

    public static function isDeletedByPhone($phone): bool {
        return self::onlyTrashed()->where('phone', $phone)->exists();
    }
}
