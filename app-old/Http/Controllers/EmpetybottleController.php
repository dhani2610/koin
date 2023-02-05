<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Koinpack_emptybottle;
use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;

class EmpetybottleController extends Controller
{

    
    
    public function index()
    {
        $items = Koinpack_emptybottle::all();
        
        return view('pages.empetybottle',[
            'items' => $items
        ]);
    }
}
