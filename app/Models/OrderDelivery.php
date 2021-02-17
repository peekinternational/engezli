<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    use HasFactory;
    protected $fillable = [
    	'conversation_id',
    	'order_id',
    	'sender_id',
    	'file',
    	'file_name',
    	'type',
    	'date',
    ];

    public function delivery()
    {
      return $this->belongsTo(OrderConversations::class, 'conversation_id');
    }

    public function userInfo()
    {
      return $this->belongsTo(User::class, 'sender_id');
    }
}
