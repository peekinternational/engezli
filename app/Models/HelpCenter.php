<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCenter extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'order_number',
        'user_id',
        'issue',
        'order_issue',
        'type',
        'problem',
        'subject',
        'description',
        'file',
    ];
}
