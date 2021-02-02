<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id',
    	'requirement',
    	'image',
    ];
    public function orderInfo()
    {
      return $this->belongsTo(Order::class, 'order_id');
    }
}
