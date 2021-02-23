<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $fillable = [
    	'services_id',
      'package_name',
    	'title',
    	'description',
    	'price',
      'delivery_time',
      'revision',
      'no_of_pages'
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'services_id');
    }
}
