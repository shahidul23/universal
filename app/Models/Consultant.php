<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'name',
        'department',
        'designation',
        'degree',
        'saturday_chamber_time',
        'sunday_chamber_time',
        'monday_chamber_time',
        'tuesday_chamber_time',
        'wednesday_chamber_time',
        'thursday_chamber_time',
        'friday_chamber_time',
        'fee'
      ];
}
