<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Expense extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected  $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
