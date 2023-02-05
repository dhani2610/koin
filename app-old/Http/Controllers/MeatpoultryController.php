<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeatpoultryController extends Controller
{
    
    public function index(Request $request)
    {
        return view('pages.meatpoultry');
    }
}
