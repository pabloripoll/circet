<?php

namespace App\Domain\Driven\User\Model;

use Illuminate\Database\Eloquent\Model;

class UserInscriptionModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'client_id',
        'is_active',
        'lang_id',
        'user',
        'passquest',
        'pin',
        'email',
        'name',
        'surname',
        'phone',
        'job',
        'picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The table associated with the model.
     */
    protected $table = 'users';

    public function table(): string
    {
        return $this->table;
    }

}
