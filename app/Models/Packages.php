<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $fillable = [
    	'service_id',
    	'title',
    	'desciption',
    	'price'
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'service_id');
    }
}
