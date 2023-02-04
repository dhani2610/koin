<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Koinpack_wishlist extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'users_id', 'products_id'
    ];

    protected $hidden =[

    ];

    public function product() 
    {
        return $this->belongsTo(Koinpack_product::class, 'products_id', 'id');
        
    }

    public function customer() 
    {
        return $this->belongsTo(Koinpack_customer::class, 'users_id', 'id');
        
    }

    public function customer_full() 
    {
        return $this->belongsTo(Users::class, 'users_id', 'id');
        
    }
    
}
