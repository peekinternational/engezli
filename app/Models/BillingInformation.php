<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingInformation extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'name',
      'company_name',
      'country',
      'state',
      'city',
      'address',
      'post_code',
      'vat_number',
      'status'

    ];
}
