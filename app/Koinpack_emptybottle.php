<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Koinpack_emptybottle extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'unique_id',
        'category_id',
        'name',
        'image',
        'info',
        'price',
        'return_refund',
        'shipping_info',
        'brand',
        'discount',
        'final_price',
        'description1',
        'description2',
        'delivery_Info',
        'stock_availability',
        'product_weight',
        'unit',
        'supplier_name',
        'supplier_price',
        'visibility',
    ];

    protected $hidden =[

    ];

    public function category() 
    {
        return $this->belongsTo(Koinpack_category::class, 'category_id', 'id');
        
    }

    public function wishlist() 
    {
        return $this->hasMany(Koinpack_wishlist::class, 'products_id', 'id');
        
    }

    public function shopping_cart() 
    {
        return $this->hasMany(koinpack_shopping_cart::class, 'products_id', 'id');
        
    }

    public function empetybottle() 
    {
        return $this->hasMany(koinpack_shopping_cart::class, 'empetybottles_id', 'id');
        
    }
}
