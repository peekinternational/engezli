<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerReviews extends Model
{
    use HasFactory;
    protected $fillable = [
    	'order_id',
    	'service_id',
    	'buyer_id',
    	'seller_id',
    	'communication_rating',
    	'service_rating',
    	'recommend_rating',
    	'overall_rating',
    	'review',
    	'date',
    	'skill_endorsement',
    	'show_work',
    ];
    public function buyerInfo()
    {
      return $this->belongsTo(User::class, 'buyer_id');
    }
}
