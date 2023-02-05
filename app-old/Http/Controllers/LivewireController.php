<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Koinpack_shopping_cart;


class LivewireController extends Controller
{
    
    public function index(Request $request)
    {
        // $items = Koinpack_shopping_cart::with([
        //     'product', 'customer','customer_full'
        // ])
        // ->whereHas('product')
        // ->whereHas('customer_full')
        // ->get();
        return view('pages.homelivewire');
    }
}
