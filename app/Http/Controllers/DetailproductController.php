<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Koinpack_product;
use Illuminate\Http\Request;

class DetailproductController extends Controller
{
    
    public function index($id)
    {
        $item = Koinpack_product::with([
            'category', 'wishlist'
            ])
            ->where('id', $id)
            // ->whereHas('category')
            ->get();
        return view('pages.detailproduct',[
            'item'     =>  $item->first()
        ]);
    }
}
