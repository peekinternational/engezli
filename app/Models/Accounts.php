<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'withdrawn',
    	'pending_clearance',
    	'current_balance',
    	'fornightly_earning',
    	'monthly_earning',
    	'total_earning',
    ];
    public function userInfo()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
