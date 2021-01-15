<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesOption extends Model
{
    use HasFactory;

    protected $fillable = [
    	'cat_id',
    	'name',
    	'type',
    ];
    public function categoryInfo()
    {
      return $this->belongsTo(Categories::class, 'cat_id');
    }
}
