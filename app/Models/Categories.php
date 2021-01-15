<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
    	'cat_title',
    	'cat_url',
    	'parent_id',
    	'cat_image',
    	'cat_desc',
    ];
}
