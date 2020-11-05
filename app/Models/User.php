<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'mobile_number',
        'mobile_number_country_code',
        'email',
        'password',
        'active',
        'ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function isActive()
    {
        return $this->active == 1 ? true : false;
    }

    // Scopes

    public function scopeIndexSelection($query, $paginate)
    {
        return $query->select('id', 'first_name', 'last_name', 'country', 'email', 'mobile_number', 'active')
            ->paginate($paginate);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    // Relations 

    // public function notifications()
    // {
    //     return $this->hasMany(UsersNotification::class);
    // }
}
