<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Koinpack_payment extends Model
{
    // use SoftDeletes;
    use HasFactory;

    protected $guarded = []; 
    
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
