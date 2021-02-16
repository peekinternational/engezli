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
    	'date',
    	'reason',
    	'status',
    ];
}
