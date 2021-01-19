<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
    	'seller_id',
    	'service_title',
    	'service_url',
    	'seo_title',
    	'cat_id',
    	'cat_child_id',
    	'search_tags',
    	'service_desc',
    	'service_img1',
    	'service_img2',
    	'service_img3',
    	'service_video',
    	'service_pdf1',
    	'service_pdf2',
    	'service_status',
    	'posted_date',
    ];
    public function serviceInfo()
    {
      return $this->belongsTo(Services::class, 'service_id');
    }
    public function buyerInfo()
    {
      return $this->belongsTo(User::class, 'buyer_id');
    }

    public function sluggable()
    {
        return [
            'service_url' => [
                'source' => 'service_title'
            ]
        ];
    }
}
