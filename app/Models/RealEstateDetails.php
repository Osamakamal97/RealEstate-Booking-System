<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RealEstateDetails extends Model
{

    protected $fillable = [
        'real_estate_id',
        'bedrooms_number',
        'beds_numbers',
        'single_beds_numbers',
        'double_beds_numbers',
        'bathroom_numbers',
        'guest_number',
        'smoke_allow',
        'pets_allow',
        'kids_allow',
        'party_allow',
        'start_arrive_at',
        'end_arrive_at',
        'start_leave_at',
        'end_leave_at',
        'indoor_facilities',
        'outdoor_facilities',
    ];

    public function setStartArriveAtAttribute($start_arrive_at)
    {
        $time = explode(':', $start_arrive_at);
        $dt = Carbon::now();
        $dt->hour($time[0]);
        $dt->minute($time[1]);
        return $this->attributes['start_arrive_at'] = $dt;
    }
    public function setEndArriveAtAttribute($end_arrive_at)
    {
        $time = explode(':', $end_arrive_at);
        $dt = Carbon::now();
        $dt->hour($time[0]);
        $dt->minute($time[1]);
        return $this->attributes['end_arrive_at'] = $dt;
    }
    public function setStartLeaveAtAttribute($start_leave_at)
    {
        $time = explode(':', $start_leave_at);
        $dt = Carbon::now();
        $dt->hour($time[0]);
        $dt->minute($time[1]);
        return $this->attributes['start_leave_at'] = $dt;
    }
    public function setEndLeaveAtAttribute($end_leave_at)
    {
        $time = explode(':', $end_leave_at);
        $dt = Carbon::now();
        $dt->hour($time[0]);
        $dt->minute($time[1]);
        return $this->attributes['end_leave_at'] = $dt;
    }
}
