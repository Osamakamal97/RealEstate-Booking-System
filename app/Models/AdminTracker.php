<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminTracker extends Model
{
    protected $table = 'admins_login_time_tracker';

    protected $fillable = ['id', 'user_id', 'start_at', 'date'];

    public $timestamps = false;
}
