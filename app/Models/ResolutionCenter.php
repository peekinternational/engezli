<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResolutionCenter extends Model
{
    use HasFactory;
    protected $fillable = [
    	'order_id',
    	'order_number',
    	'user_id',
    	'reason',
    	'details',
    	'status',
    ];
}
