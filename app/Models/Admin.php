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

    public function isActive()
    {
        return $this->active == 1 ? true : false;
    }

    public function getArRoleName()
    {
        return $this->getRoleNames()[0] == 'manager' ? 'مدير' : 'موظف';
    }

    public function getRoleKey()
    {
        return $this->getRoleNames()[0] == 'manager' ? 1 : 2;
    }

    public function loginTime()
    {
        $times = AdminTracker::where('user_id', $this->id)->where('date', now()->toDateString())->get();
        if ($times->count() > 0) {
            $sum = 0;
            foreach ($times as $time) {
                if ($time->end_at != null)
                    $sum += $time->end_at - $time->start_at;
                else
                    $sum += time() - $time->start_at;
            }
            return $this->formatSeconds($sum);
        }
        return 'لم يقم هذا المسؤول بالتسجيل اليوم بعد.';
    }

    function formatSeconds($seconds)
    {
        $hours = 0;
        $milliseconds = str_replace("0.", '', $seconds - floor($seconds));

        if ($seconds > 3600) {
            $hours = floor($seconds / 3600);
        }
        $seconds = $seconds % 3600;


        return str_pad($hours, 2, '0', STR_PAD_LEFT)
            . gmdate(':i:s', $seconds)
            . ($milliseconds ? ".$milliseconds" : '');
    }

    // Scopes

    public function scopeIndexSelection($query, $paginate)
    {
        return $query->select('id', 'name', 'email', 'active', 'last_login_at')
            ->role(['manager', 'employee'])
            ->paginate($paginate);
    }

    public function scopeEmployees($query, $paginate)
    {
        return $query->select('id', 'name', 'email', 'active', 'last_login_at')
            ->role('employee')
            ->paginate($paginate);
    }

    // Mutator

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
