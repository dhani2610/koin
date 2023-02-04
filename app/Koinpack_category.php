<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Koinpack_category extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'name_category'
    ];

    protected $hidden =[

    ];

    public function product() 
    {
        return $this->hasMany(Koinpack_product::class, 'category_id', 'id');
        
    }
    
}
