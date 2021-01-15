<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_number',
    	'service_id',
    	'buyer_id',
    	'order_date',
    	'order_time',
    	'order_duration',
    	'order_qty',
    	'order_fee',
    	'order_active',
    	'complete_time',
    	'order_status',
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'service_id');
    }
    public function buyerInfo()
    {
      return $this->belongsTo(User::class, 'buyer_id');
    }
}
