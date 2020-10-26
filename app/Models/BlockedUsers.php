<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedUsers extends Model
{
    protected $table = 'blocked_users';

    protected $fillable = ['user_id', 'ip'];

    protected $hidden = ['created_at', 'update_at'];

}
