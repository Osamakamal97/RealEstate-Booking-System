<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersNotification extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'status'];

    
}
