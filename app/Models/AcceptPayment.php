<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptPayment extends Model
{
    use HasFactory;
    protected $fillable = [
    	'merchant_order_id',
    	'seller_id',
    	'buyer_id',
    	'service_id',
    	'package_id',
    	'accept_transaction_id',
    	'status',
    	'type',
    	'paid',
    	'paid_at',
    	'order_duration',
    	'order_qty',
    	'order_fee',
    	'service_fee',
    ];
    public function sellerInfo()
    {
      return $this->belongsTo(User::class, 'seller_id');
    }
    public function buyerInfo()
    {
      return $this->belongsTo(User::class, 'buyer_id');
    }
    public function serviceInfo()
    {
      return $this->belongsTo(User::class, 'service_id');
    }
}
