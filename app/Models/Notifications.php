<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $fillable = [
    	'receiver_id',
    	'sender_id',
    	'order_id',
    	'conversation_id',
    	'reason',
    	'notification_date',
    	'status',
    ];
    public function orderInfo()
    {
      return $this->belongsTo(Order::class, 'order_id');
    }
    public function senderInfo()
    {
      return $this->belongsTo(User::class, 'sender_id');
    }
    public function receiverInfo()
    {
      return $this->belongsTo(User::class, 'receiver_id');
    }
    public function lastMessage()
    {
      return $this->belongsTo(OrderConversations::class, 'conversation_id');
    }
  
}
