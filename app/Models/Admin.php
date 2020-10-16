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

    // Scopes

    public function scopeIndexSelection($query)
    {
        return $query->select('id','name','email','active')->role(['manager', 'employee'])->get();
    }

    // Mutator
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
