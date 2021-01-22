<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
    	'services_id',
    	'question',
    	'response',
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'services_id');
    }
}
