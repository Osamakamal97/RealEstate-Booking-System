<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasRoles;

    protected $fillable = ['id', 'name', 'email', 'password', 'active'];

    protected $hidden = ['password', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'];

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function getArRoleName()
    {
        return $this->getRoleNames()[0] == 'manager' ? 'مدير' : 'موظف';
    }

    public function getRoleKey()
    {
        return $this->getRoleNames()[0] == 'manager' ? 1 : 2;
    }

    // Scopes

    public function scopeIndexSelection($query, $paginate)
    {
        return $query->select('id', 'name', 'email', 'active')
            ->role(['manager', 'employee'])
            ->paginate($paginate);
    }

    // Mutator

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
