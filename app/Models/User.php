<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

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
        'type', // 0 to customer 1 to real estate owner
        'status',
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

    public function getStatus()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function isActive()
    {
        return $this->status == 1 ? true : false;
    }

    // Scopes

    public function scopeCustomers($query, $paginate)
    {
        return $query->select('id', 'first_name', 'last_name', 'country', 'email', 'mobile_number', 'status')
            ->where('type', '0')
            ->paginate($paginate);
    }

    public function scopeRealEstateOwners($query, $paginate)
    {
        return $query->select('id', 'first_name', 'last_name', 'country', 'email', 'mobile_number', 'status')
            ->where('type', '1')
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
