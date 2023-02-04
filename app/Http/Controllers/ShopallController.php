<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopallController extends Controller
{
    
    public function index(Request $request)
    {
        return view('pages.shopall');
    }
}
