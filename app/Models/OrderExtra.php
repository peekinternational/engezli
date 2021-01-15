<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtra extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id',
    	'name',
    	'price',
    ];
    public function orderInfo()
    {
      return $this->belongsTo(Order::class, 'order_id');
    }
}
