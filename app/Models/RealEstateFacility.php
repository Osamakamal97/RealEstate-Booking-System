<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealEstateFacility extends Model
{
    protected $table = 'facilities';

    protected $fillable = ['place', 'name'];

    public function scopeIndexSelection($query, $paginate)
    {
        return $query->select('id', 'name', 'place')
            ->paginate($paginate);
    }

    public function getStatus()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function getPlace()
    {
        return $this->place == 'indoor' ? 'داخلي' : 'خارجي';
    }
}
