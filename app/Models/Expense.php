<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class Expense extends Model implements HasMedia
{
    use HasFactory;

    protected  $guarded = [];
}
