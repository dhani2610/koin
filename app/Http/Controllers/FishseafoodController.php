<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FishseafoodController extends Controller
{
    
    public function index(Request $request)
    {
        return view('pages.fishseafood');
    }
}
