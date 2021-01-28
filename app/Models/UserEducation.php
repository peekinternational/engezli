<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'education_data',
    	'country',
    	'major',
    	'institute',
    	'degree_year',
    ];
}
