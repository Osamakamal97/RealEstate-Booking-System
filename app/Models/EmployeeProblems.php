<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EmployeeProblems extends Model
{
    protected $fillable = ['admin_id', 'title', 'content', 'status'];

    protected $hidden = ['created_at', 'updated_at', 'admin_id'];

    public function getStatus()
    {
        return $this->status == 0 ? 'غير مقروءة' : 'مقروءة';
    }

    public function getSendTime()
    {
        return $this->created_at->locale('ar')->settings(['formatFunction' => 'translatedFormat'])->format('g:i a');
    }

    public function getFullSendTime()
    {
        return $this->created_at->locale('ar')->settings(['formatFunction' => 'translatedFormat'])->format('g:i a l jS F Y');
    }

    // relationship

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // scope

    public function scopeIndexSelection($query, $paginate)
    {
        return $query->select('id', 'title', 'admin_id', 'status', 'created_at')
            ->paginate($paginate);
    }
}
