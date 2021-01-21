<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Categories extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
    	'cat_title',
    	'cat_url',
    	'parent_id',
    	'cat_image',
    	'cat_desc',
    ];
    public function searchableAs()
    {
        return 'categories_index';
    }
    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }
    public function getScoutKey()
   {
       return $this->cat_title;
   }

   /**
    * Get the key name used to index the model.
    *
    * @return mixed
    */
   public function getScoutKeyName()
   {
       return 'cat_title';
   }
}
