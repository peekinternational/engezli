<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesOptionService extends Model
{
    use HasFactory;

    protected $fillable = [
    	'services_id',
    	'package_option_id',
    	'value',
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'services_id');
    }
    public function packageOptionInfo()
    {
      return $this->belongsTo(PackagesOption::class, 'package_option_id');
    }
}
