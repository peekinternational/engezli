<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderConversations extends Model
{
    use HasFactory;
    protected $fillable = [
    	'order_id',
    	'sender_id',
    	'message',
    	'file',
    	'file_name',
    	'message_type',
    	'date',
    	'reason',
    	'status',
    ];

    public function userInfo()
    {
      return $this->belongsTo(User::class, 'sender_id');
    }

    public function delivery()
    {
      return $this->hasMany(OrderDelivery::class, 'conversation_id');
    }
    public function order()
    {
      return $this->belongsTo(Order::class, 'order_id');
    }
}
