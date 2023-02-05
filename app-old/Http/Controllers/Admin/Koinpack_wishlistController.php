<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Koinpack_wishlist;
use App\Users;
use App\Koinpack_product;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\K_wishlistRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Alert;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Koinpack_wishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Koinpack_wishlist::with([
            'product', 'customer','customer_full'
        ])
        ->whereHas('product')
        ->whereHas('customer_full')
        ->get();
        // $user= Auth::user()->roles;
        // dd($items);

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'success' => true,
                'data' => $items
                ], 200);
        }

        return view('pages.admin.wishlist-koinpack.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Users::where('customers_id','!=', null)->get();
        $products = Koinpack_product::all();

        return view('pages.admin.wishlist-koinpack.create',[
            'users' => $users,
            'products' => $products,

        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(K_wishlistRequest $request)
    {
        // $request->validate([
        //     'name_category'         =>  'required|max:100|unique:koinpack_categories,name_category',
        // ]);

        $data = $request->all();
        // dd($data['image']);
        // $data['image'] = $request->file('image') != null ? $request->file('image')->store('assets/gallery', 'public') : null;         
        
        try {
            $item = Koinpack_wishlist::create($data);
            // dd($item);
        } catch (QueryException $e) {
            
            if(\Request::segment(1) == 'api') {
                return response([
                    'status' => 'error',
                    'message' => 'save error ',
                    'data' => $item
                ], 401);
            }
            return back()->with('error', 'Error Create');
        }    
        if(\Request::segment(1) == 'api') {
            return response([
                'success' => True,
                'data' => $item
            ], 200);           
        }
        Alert::success('Wishlist Created Successfully');        
        return redirect()->route('wishlists.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Koinpack_wishlist::findOrFail($id);

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'success' => true,
                'data' => $item
                ], 200);
        }

        return view('pages.admin.wishlist-koinpack.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Koinpack_wishlist::with([
            'product', 'customer','customer_full'
        ])
        ->findOrFail($id);

        $users = Users::where('customers_id','!=', null)->get();
        $products = Koinpack_product::all();

        return view('pages.admin.wishlist-koinpack.edit', [
            'item' => $item,
            'users' => $users,
            'products' => $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(K_wishlistRequest $request, $id)
    {
        
        // $request->validate([
        //     'name_category'         =>  'required|max:100|unique:koinpack_categories,name_category,'. $id,

        // ]);

        $data = $request->all();
        //$data['slug'] = Str::slug($request->title); //menambahkan slug, sebagai ID tapi lebih cantiknya
        // $request->file('foto') != null ? $data['foto'] = $request->file('foto')->store('assets/gallery', 'public') : $data['foto'] = null;

        // $request->file('image') != null ? $data['image'] = $request->file('image')->store('assets/gallery', 'public') : null;

        $item = Koinpack_wishlist::findOrFail($id);
        try {
            
            $item->update($data);
        } catch (QueryException $e) {
            if(\Request::segment(1) == 'api') {
                return response([
                    'status' => 'error',
                    'message' => 'edit error ',
                    'data' => $item
                    // 'status' => $sell_properties
                ], 401);
            }
            // return back()->with('error', 'Error Update : '.getMessage() );
            return back()->with('error', 'Error Update');
        }  

        if(\Request::segment(1) == 'api') {
            return response([
                'success' => True,
                'data' => $item
                // 'status' => $sell_properties
            ], 200);
        }
        Alert::success('Wishlist Updated Successfully ');           
        return redirect()->route('wishlists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Koinpack_wishlist::findOrFail($id);
        
        $item->delete();

        if(\Request::segment(1) == 'api') {
            return response([
                'success' => True,
                'data' => $item
            ], 200);
        }
        Alert::success('Wishlist Delete Successfully ');        
        return redirect()->route('wishlists.index');
    }

    public function restore()
    {
        // Alert::success('Berhasil menghapus data !')->persistent('Confirm');
        $resore_Soft_Delete = Koinpack_wishlist::onlyTrashed();
        $resore_Soft_Delete->restore();
        // if(\Request::segment(1) == 'api') {
        //     return response()->json($resore_Soft_Delete, 200);
        // }
        // Alert::warning('Success Title','Success Restore ')->persistent('Close');
        return redirect()->route('services-wishlists.index');
    }


    
    

    public function profile($id)
    {
        $Koinpack_wishlist = Koinpack_wishlist::findOrFail($id);
        $ongoings = Ongoing::with([
            'customer', 'Koinpack_wishlist', 'groomer'
            ])->where('Koinpack_products_id', $id)
                // ->where('acc', '!=', null)
                ->orderBy('created_at', 'DESC')
                ->get();

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Semua Ongoing',
                    'data' => $ongoing, $Koinpack_wishlist
                    ], 200);
            }

        return view('pages.admin.profile-Koinpack_wishlist', [
            'Koinpack_wishlist' => $Koinpack_wishlist,
            'ongoings' => $ongoings
        ]);        
    }

    public function transaksi($id)
    {
        // $items = Ongoing::select('ongoings.*')
        // ->join('customers','customers.id', '=','ongoings.customers_id')
        // ->join('users','users.customers_id', '=','customers.id')
        // ->with([
        //     'customer', 'Koinpack_wishlist', 'groomer'
        //     ])
        //     ->where('ongoings.Koinpack_products_id', $id)
            
        //     ->orderBy('created_at', 'DESC')
        //     ->get();

        $items = Ongoing::with([
            'customer', 'Koinpack_wishlist', 'groomer'
            ])->where('Koinpack_products_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Semua Transaction'.$id,
                    'data' => $items
                    ], 200);
            }
            
        return view('pages.admin.transactions-Koinpack_wishlist', [
            'items' => $items
        ]);        
    }

    public function invoice($id)
    {
        // $items = Ongoing::select('ongoings.*')
        // ->join('customers','customers.id', '=','ongoings.customers_id')
        // ->join('users','users.customers_id', '=','customers.id')
        // ->with([
        //     'customer', 'Koinpack_wishlist', 'groomer'
        //     ])
        //     ->where('ongoings.id', $id)
            
        //     // ->orderBy('created_at', 'DESC')
        //     ->get();
        $items = Ongoing::with([
            'customer', 'Koinpack_wishlist', 'groomer'
            ])->where('id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
            

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Invoice'.$id,
                    'data' => $items
                    ], 200);
            }
            
        return view('pages.admin.invoice-Koinpack_wishlist', [
            'items' => $items
        ]);
                
    }
}
