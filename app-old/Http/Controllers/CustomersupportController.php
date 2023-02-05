<?php

namespace App\Http\Controllers;

use App\Koinpack_location;
use Illuminate\Http\Request;

class CustomersupportController extends Controller
{
    
    public function index(Request $request)
    {
        $locations = Koinpack_location::all();
        return view('pages.customersupport',[
            'locations'  =>  $locations
        ]);
    }
}
