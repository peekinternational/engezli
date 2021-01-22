<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    use HasFactory;

    protected $fillable = [
    	'services_id',
    	'title',
    	'description',
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'services_id');
    }
}
