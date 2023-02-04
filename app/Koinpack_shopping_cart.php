<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Koinpack_shopping_cart extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'users_id','products_id','empetybottles_id','qty'
    ];

    protected $hidden =[

    ];

    public function empetybottle() 
    {
        return $this->belongsTo(Koinpack_emptybottle::class, 'empetybottles_id', 'id');
        
    }

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
