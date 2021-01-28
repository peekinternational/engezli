<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;
    protected $fillable = [
    	'user_id',
    	'from_date',
    	'to_date',
    	'company',
    	'position',
    ];
}
