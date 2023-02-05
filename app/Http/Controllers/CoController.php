<?php

namespace App\Http\Controllers;

use App\Koinpack_customer;
use App\Koinpack_payment;
use App\Koinpack_voucher;
use Illuminate\Http\Request;
use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;

class CoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $customer = Koinpack_customer::where('id', $user->id)->first();

        $items = Koinpack_shopping_cart::with([
            'product', 'customer', 'customer_full'
        ])
            ->whereHas('product')
            ->whereHas('customer_full')
            ->get();
        // dd($items);

        if ($request->ajax()){
            $title = $request->search;
            $voucher = Koinpack_voucher::where('title', $title)->first();

            if ($voucher == null){
                return response()->json([
                    'req' => $request->search,
                    'msg' => 'Voucher Tidak Ditemukan!'
                ]);
            }else{
                return response()->json([
                    'req' => $request->search,
                    'msg' => 'Voucher Ditemukan',
                    'price' => $voucher->price
                ]);
            }

        }

        return view('pages.co', [
            'items' =>    $items,
            'user' => $user,
            'customer' => $customer
        ]);
    }

    public function success($id){
        $get = Koinpack_payment::find($id);

        return view('sc.index', [
          'data' => $get
        ]);
    }
}
