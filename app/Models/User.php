<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Cashier\Billable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'mobile_number',
        'account_type',
        'password',
        'profile_image',
        'cover_image',
        'verification',
        'user_status',
        'country',
        'state',
        'city',
        'bio',
        'description',
        'recent_delivery',
        'member_since',
        'language_id',
        'level_id',
        'birth_date',
        'gender',
        'website',
        'organization',
        'skills_id',
        'occuption',
        'facebook_id',
        'google_id',
    ];

    public function messages()
    {
      return $this->hasMany(ChatMessages::class, 'id');
    }

    public function userReviews()
    {
      return $this->hasMany(BuyerReviews::class, 'seller_id')->orderby('id','desc');
    }
    
    public function searchableAs()
    {
        return 'users_index';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
