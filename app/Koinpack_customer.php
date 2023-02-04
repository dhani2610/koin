<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Koinpack_customer extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'id','address', 'long', 'lat',
    ];

    protected $hidden =[

    ];

    public function payment() 
    {
        return $this->hasMany(Koinpack_payment::class, 'users_id', 'id');
        
    }

    public function wishlist() 
    {
        return $this->hasMany(Koinpack_wishlist::class, 'products_id', 'id');
        
    }

    public function shopping_cart() 
    {
        return $this->belongsTo(koinpack_shopping_cart::class, 'users_id', 'id');
        
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'customers_id','id'); 
    }

    public function user()
    {
        return $this->hasMany(User::class, 'customers_id','id'); 
    }

    public function order()
    {
        return $this->hasMany(Coolze_order::class, 'partners_id','id'); 
    }
    
    
    
    // public function doctors_id()
    // {
    //     return $this->belongsTo(Doctor::class, 'id', 'doctors_id'); //dari tabel parent to child 
    // }
    // public function groomers_id()
    // {
    //     return $this->belongsTo(Groomer::class, 'id', 'groomers_id'); //dari tabel parent to child 
    // }

    public function groomer()
    {
        return $this->belongsTo(Groomer::class, 'groomers_id', 'id');
    }
}
