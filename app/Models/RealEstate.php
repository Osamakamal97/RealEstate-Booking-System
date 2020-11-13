<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    protected $fillable = [
        'id',
        'name',
        'type',
        'address',
        'postal_code',
        'google_map_address',
        'post_in_other_websites',
        'photos',
        'price',
        'days_before_cancel_book',
        'is_cancel_book_free',
        'discount_percent_when_cancel_book',
        'confirmed',
        'user_id',
        'status'
    ];

    public function getStatus()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function setIsCancelBookFreeAttribute($is_cancel_book_free)
    {
        return $is_cancel_book_free == 0 ?
            $this->attributes['is_cancel_book_free'] = false :
            $this->attributes['is_cancel_book_free'] = true;
    }

    public function setPostInOtherWebsiteAttribute($post_in_other_websites)
    {
        return $post_in_other_websites == 0 ?
            $this->attributes['post_in_other_websites'] = false :
            $this->attributes['post_in_other_websites'] = true;
    }
}
