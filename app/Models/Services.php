<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

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
    public function packageInfo()
    {
      return $this->hasMany(Packages::class, 'services_id');
    }
    public function favorite()
    {
      return $this->hasMany(FavoriteService::class, 'services_id');
    }
    public function serviceFaq()
    {
      return $this->hasMany(ServiceFaq::class, 'services_id');
    }
    public function serviceReq()
    {
      return $this->hasMany(ServiceRequirement::class, 'services_id');
    }
    public function servicePackgOptions()
    {
      return $this->hasMany(PackagesOptionService::class, 'services_id');
    }
    public function sellerInfo()
    {
      return $this->belongsTo(User::class, 'seller_id');
    }
    public function serviceRating()
    {
      return $this->hasMany(BuyerReviews::class, 'service_id')->orderBy('id','desc');
    }

    public function sluggable()
    {
        return [
            'service_url' => [
                'source' => 'service_title'
            ]
        ];
    }
    // public function searchableAs()
    // {
    //     return 'services_index';
    // }
}
