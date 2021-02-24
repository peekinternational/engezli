<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id',
    	'requirement_id',
    	'requirement',
    	'image',
    	'type',
    ];
    public function orderInfo()
    {
      return $this->belongsTo(Order::class, 'order_id');
    }
    public function requirementInfo()
    {
      return $this->belongsTo(ServiceRequirement::class, 'requirement_id');
    }
}
