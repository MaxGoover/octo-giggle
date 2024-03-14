<?php

declare(strict_types=1);

namespace App\Entities\Auth;

use App\Adapters\Helpers\Notification\AuthEmailCodeHelper;
use App\Entities\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AuthEmailCode extends Model
{
    protected $table = AuthEmailCodeHelper::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        AuthEmailCodeHelper::ACTIVE,
        AuthEmailCodeHelper::CODE,
        AuthEmailCodeHelper::USER_ID,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        AuthEmailCodeHelper::CODE => 'integer',
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
        return $query->where(AuthEmailCodeHelper::ACTIVE, 1);
    }

    /** Accessors/Mutators */

    /** Logic */
    // TODO: Вынести в аксессор
    public function isExpiredTimeout(): bool
    {
        $dateExpiration = Carbon::parse($this->created_at)
            ->addSeconds(config('settings.auth.email_code.timeout'));
        return $dateExpiration < Carbon::now();
    }

    // TODO: Вынести в аксессор
    public function timeout(): int
    {
        $created_at = Carbon::parse($this->created_at);
        return config('settings.auth.email_code.timeout') - $created_at->diffInSeconds(Carbon::now());
    }
}
