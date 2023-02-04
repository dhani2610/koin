<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Koinpack_customer;
use App\Koinpack_payment;
use App\Koinpack_shopping_cart;
use App\Koinpack_wishlist;
use App\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyaccountController extends Controller
{
    
    public function index(Request $request)
    {
        // orders
        $orders = Koinpack_payment::where('users_id',Auth::user()->id )
                ->orderBy('created_at', 'DESC')   
                ->get();

        // setting start
        $user = Users::with([
            'customer'
            ])
            ->where('customers_id', Auth::user()->id)
            ->first();
        $userWishlists = Koinpack_wishlist::with([
            'product', 'customer','customer_full'
        ])
        ->whereHas('product')
        ->whereHas('customer_full')
        ->where('users_id', Auth::user()->id)
        ->get();

        $emptyBottles = Koinpack_shopping_cart::with([
            'empetybottle'
        ])
        ->whereHas('empetybottle')
        ->where('users_id', Auth::user()->id)
        ->get();

        $totaleEmptyBottle = 0;
        foreach ($emptyBottles as $emptyBottle) {
            $sumQtyBottle = $emptyBottle->qty * $emptyBottle->empetybottle->price;

            $totaleEmptyBottle +=$sumQtyBottle;
        }
        // dd($userWishlists->first());
        return view('pages.myaccount',[
            'userWishlists'      => $userWishlists,
            'totaleEmptyBottle'     =>  $totaleEmptyBottle,
            'user'                  =>  $user,
            'orders'                =>  $orders,

        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $item = Users::with([
            'customer'
        ])->findOrFail($id);

        $customer = Koinpack_customer::findOrFail($item->customer->id);

        $item_user = $item->update([
            // 'image'         => $path,
            'name'         => $request->name,
            'email'        => $request->email,
            // 'password'     => $pass,
            'phone'        => $request->phone,
            // 'gender'        => $request->gender,
            // 'day_of_birth' => $request->day_of_birth,
            // 'isVerified'   => $request->isVerified,
            // 'roles'        => $request->roles,
            // 'status'       => $request->status,
        ]);

        $item_customer = $customer->update([
            'address'         => $request->address,
            // 'long'            => $request->long,
            // 'lat'             => $request->lat,
        ]);    
        return redirect()->action('MyaccountController@index');

    }
}
