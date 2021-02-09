<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    use HasFactory;
    protected $fillable = [
      'conversation_id',
      'message_sender',
      'message_receiver',
      'message_offer_id',
      'message_desc',
      'message_file',
      'message_date',
      'message_status'
    ];

    public function senderInfo()
    {
      return $this->belongsTo(User::class, 'message_sender');
    }
    public function receiverInfo()
    {
      return $this->belongsTo(User::class, 'message_receiver');
    }
}
