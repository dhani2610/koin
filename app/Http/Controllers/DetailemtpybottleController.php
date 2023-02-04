<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Koinpack_emptybottle;
use Illuminate\Http\Request;

class DetailemtpybottleController extends Controller
{
    
    public function index($id)
    {
        $item = Koinpack_emptybottle::with([
            'wishlist'
            ])
            ->where('id', $id)
            // ->whereHas('category')
            ->get();
            // dd($item);
        return view('pages.detailemptyproduct',[
            'item'     =>  $item->first()
        ]);
    }
}
