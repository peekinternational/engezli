<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id',
    	'amount',
    	'method',
    	'date',
    ];
    public function orderInfo()
    {
      return $this->belongsTo(Order::class, 'order_id');
    }
}
