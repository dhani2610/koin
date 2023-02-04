<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Koinpack_statusupdate extends Model
{
    // use SoftDeletes;
    use HasFactory;

    protected $guarded = []; //agar dapat menginputkan data sekaligu
    // protected $fillable = [
    //     'users_id','products_id','qty'
    // ];

    // protected $hidden =[

    // ];

    
    
}
