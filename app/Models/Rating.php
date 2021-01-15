<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
    	'seller_id',
    	'order_id',
    	'buyer_id',
    	'seller_rating',
    	'service_rating',
    	'recommanded_rating',
    	'communication_rating',
    	'review',
    	'review_date',
    ];
    public function sellerInfo()
    {
      return $this->belongsTo(User::class, 'seller_id');
    }
    public function buyerInfo()
    {
      return $this->belongsTo(User::class, 'buyer_id');
    }
    public function orderInfo()
    {
      return $this->belongsTo(Order::class, 'order_id');
    }
}
