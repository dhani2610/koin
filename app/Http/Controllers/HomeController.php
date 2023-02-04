<?php

namespace App\Http\Controllers;

use App\Koinpack_product;
use App\Koinpack_productconvert;
use App\Koinpack_shopping_cart;
use App\Koinpack_sliderlogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        // convert table product
        // $converts = Koinpack_productconvert::all();
        // foreach ($converts as $convert) {
        //     $uniqid = mt_rand(100000, 999999);
        //     $product = new Koinpack_product;

        //     $product->unique_id = $uniqid;
        //     $product->category_id = 1;
        //     $product->name = $convert->name ?? null;
        //     $product->unit = $convert->unit ?? null;
        //     $product->stock_availability = $convert->quantity?? null;
        //     $product->favorite = $convert->favorite ?? null;
        //     $product->internal = $convert->internal ?? null;
        //     $product->cost = $convert->cost ?? null;
        //     $product->forecasted = $convert->forecasted ?? null;
        //     $product->save();    
        // }
        
        // dd('s');

        // slider logo

        $slider_logos = Koinpack_sliderlogo::all();

        $items = Koinpack_product::with([
            'category'
            ])
            ->whereHas('category')
            ->get();
        
        return view('pages.home',[
            'items'         => $items,
            'slider_logos'   => $slider_logos
        ]);
    }

    public function logoutuser()
    {
        Auth::logout();
    
        Session::flush();
        return redirect('/');
    }

    // public function edit($id)
    // {
    //     $productBestDeal = Koinpack_product::with([
    //         'category'
    //         ])->get();
        
    //     if($productBestDeal)
    //     {
    //         return response()->json([
    //             'status'=>200,
    //             'productBestDeal'=> $productBestDeal,
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status'=>404,
    //             'message'=>'No Product Best Deal Found.'
    //         ]);
    //     }
        
    // }

    public function fetchbestdeal()
    {
        $productBestDeal = Koinpack_product::with([
            'category'
            ])->get();
        
            return response()->json([
                'status'=>200,
                'productBestDeal'=> $productBestDeal,
            ]);
        
    }


    public function fetchcart()
    {
        // product bestDeal
        $productBestDeal = Koinpack_product::with([
            'category'
            ])->get();

        // cart
        if (Auth::user()) {
            $carts = Koinpack_shopping_cart::with([
                'product', 'customer','customer_full'
            ])
            ->whereHas('product')
            ->whereHas('customer_full')
            ->where('users_id',Auth::user()->id)
            ->get();
    
            // $carts = $carts->unique('products_id');
            $cartProduct = [];
            $total = 0;
            foreach ($carts->unique('products_id') as $cart) {
                $sumQty = $carts->where('products_id',$cart->products_id)->sum('qty');
                
                $cartProduct[]=[
                    'name'  =>$cart->product->name,
                    'image' =>$cart->product->image,
                    'price' =>'Rp '.number_format($cart->product->price,0,',','.'),
                    'qty'   =>$sumQty
                ];
                
                $kali = $sumQty * $cart->product->price;                                
                $total +=$kali;
            }
            // dd($cartProduct);
    
            // dd($total);
            $total = 'Rp '.number_format($total,0,',','.');
    
            $countBadge = $carts->unique('products_id')->count();
            
            
    
            return response()->json([
                'carts'             =>    $carts,
                'countBadge'        =>    $countBadge,
                'cartProduct'       =>    $cartProduct,
                'total'             =>    $total,
                'productBestDeal'   =>    $productBestDeal,
    
            ]);
        }

        
        
        return response()->json([
            'status'=>200,
            'productBestDeal'=> $productBestDeal,
        ]);
        
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'jumlahQty'=> 'max:191',
            // 'course'=>'required|max:191',
            // 'email'=>'required|email|max:191',
            // 'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                // 'errors'=>$validator->messages()
            ]);
        }
        else
        {	
            $student = new Koinpack_shopping_cart();
            $student->users_id = Auth::user()->id;
            $student->products_id = $request->input('idProductQty');
            $student->qty = $request->input('jumlahQty');
            // $student->qty = 1;
                        
            $student->save();

            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }

    }
}
