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
    	'seller_id',
    	'buyer_id',
    	'order_date',
    	'order_time',
    	'start_time',
    	'end_time',
    	'time_zone',
    	'order_duration',
    	'order_qty',
    	'order_fee',
    	'service_fee',
    	'order_active',
    	'complete_time',
    	'order_status',
    	'delivery_time',
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'service_id');
    }
    public function buyerInfo()
    {
      return $this->belongsTo(User::class, 'buyer_id');
    }
    public function sellerInfo()
    {
      return $this->belongsTo(User::class, 'seller_id');
    }
    public function orderRequirement()
    {
      return $this->hasMany(OrderRequirement::class, 'order_id');
    }

}
