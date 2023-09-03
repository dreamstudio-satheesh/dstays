<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['check_in', 'check_out'];

    public function getCheckInAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function getCheckOutAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
