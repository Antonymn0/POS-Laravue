<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
     use HasFactory,  Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'status',
        'visibility',
        'type',
        'sku',
        'regular_price',
        'description',
        'summary',
        'sale_price',
        'taxable',
        'weight',
        'length',
        'width',
        'height',
        'purchase_note',
        'meta_title',
        'meta_description',
        'sell_button_text',
        'virtual',
        'downloadable',
        'sale_start_date',
        'sale_end_date',
        'publish_at',
        'deleted_at',
        'suspended_at',
        'featured_img'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
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
