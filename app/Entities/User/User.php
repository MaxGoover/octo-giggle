<?php

namespace App\Entities\User;

/**
 * @property int $id
 * @property string $phone
 * @property string|null $api_token
 * @property bool $active
 * @property Carbon|null $last_online
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'api_token',
        'active',
        'last_online',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['api_token', 'active'];

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

    /** Реляционные связи */

    /** Скоупы */

    /** Аксессоры/мутаторы */

    /** Логика */
}
