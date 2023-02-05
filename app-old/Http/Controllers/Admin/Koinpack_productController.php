<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Koinpack_product;
use App\Koinpack_category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Koinpack_productRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Alert;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Koinpack_productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Koinpack_product::with([
            'category'
            ])->get();
        // $user= Auth::user()->roles;
        // dd($items);

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'success' => true,
                'data' => $items
                ], 200);
        }

        return view('pages.admin.product-koinpack.index', [
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
        $categories = Koinpack_category::all();

        return view('pages.admin.product-koinpack.create',[
            'categories'    => $categories,
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Koinpack_productRequest $request)
    {
        $request->validate([
            'unique_id'         =>  'required|max:50|unique:koinpack_products,unique_id',
        ]);

        $data = $request->all();
        // dd($data['image']);
        $data['image'] = $request->file('image') != null ? $request->file('image')->store('assets/gallery', 'public') : null;         
        
        try {
            $item = Koinpack_product::create($data);
            // dd($item);
        } catch (QueryException $e) {
            
            if(\Request::segment(1) == 'api') {
                return response([
                    'status' => 'error',
                    'message' => 'error save',
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
        Alert::success('Product ', $item->name.' Created Successfully');        
        return redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Koinpack_product::findOrFail($id);

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'success' => true,
                'data' => $item
                ], 200);
        }

        return view('pages.admin.product-koinpack.detail', [
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
        $item = Koinpack_product::findOrFail($id);
        $categories = Koinpack_category::all();

        return view('pages.admin.product-koinpack.edit', [
            'item'       => $item,
            'categories' => $categories,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Koinpack_productRequest $request, $id)
    {
        
        $request->validate([
            'unique_id'         =>  'required|max:50|unique:koinpack_products,unique_id,'. $id,
        ]);

        $data = $request->all();
        //$data['slug'] = Str::slug($request->title); //menambahkan slug, sebagai ID tapi lebih cantiknya
        // $request->file('foto') != null ? $data['foto'] = $request->file('foto')->store('assets/gallery', 'public') : $data['foto'] = null;

        $request->file('image') != null ? $data['image'] = $request->file('image')->store('assets/gallery', 'public') : null;

        $item = Koinpack_product::findOrFail($id);
        try {
            //delete image
            if ($request->file('image') != null) {
                // dd('a');
                if(File::exists(('storage/'.$item->image))){
                    File::delete('storage/'.$item->image);            
                }
            }
            
            $item->update($data);
        } catch (QueryException $e) {
            if(\Request::segment(1) == 'api') {
                return response([
                    'status' => 'error',
                    'message' => 'error edit',
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
        Alert::success('Product ', $item->name.' Updated Successfully ');           
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Koinpack_product::findOrFail($id);
        //delete image
        if(File::exists(('storage/'.$item->image))){
            File::delete('storage/'.$item->image);            
        }
        $item->delete();

        if(\Request::segment(1) == 'api') {
            return response([
                'success' => True,
                'data' => $item
            ], 200);
        }
        Alert::success('Product ', $item->name.' Delete Successfully ');        
        return redirect()->route('products.index');
    }

    public function restore()
    {
        // Alert::success('Berhasil menghapus data !')->persistent('Confirm');
        $resore_Soft_Delete = Koinpack_product::onlyTrashed();
        $resore_Soft_Delete->restore();
        // if(\Request::segment(1) == 'api') {
        //     return response()->json($resore_Soft_Delete, 200);
        // }
        // Alert::warning('Success Title','Success Restore ')->persistent('Close');
        return redirect()->route('services-products.index');
    }


    
    

    public function profile($id)
    {
        $Koinpack_product = Koinpack_product::findOrFail($id);
        $ongoings = Ongoing::with([
            'customer', 'Koinpack_product', 'groomer'
            ])->where('Koinpack_products_id', $id)
                // ->where('acc', '!=', null)
                ->orderBy('created_at', 'DESC')
                ->get();

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Semua Ongoing',
                    'data' => $ongoing, $Koinpack_product
                    ], 200);
            }

        return view('pages.admin.profile-Koinpack_product', [
            'Koinpack_product' => $Koinpack_product,
            'ongoings' => $ongoings
        ]);        
    }

    public function transaksi($id)
    {
        // $items = Ongoing::select('ongoings.*')
        // ->join('customers','customers.id', '=','ongoings.customers_id')
        // ->join('users','users.customers_id', '=','customers.id')
        // ->with([
        //     'customer', 'Koinpack_product', 'groomer'
        //     ])
        //     ->where('ongoings.Koinpack_products_id', $id)
            
        //     ->orderBy('created_at', 'DESC')
        //     ->get();

        $items = Ongoing::with([
            'customer', 'Koinpack_product', 'groomer'
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
            
        return view('pages.admin.transactions-Koinpack_product', [
            'items' => $items
        ]);        
    }

    public function invoice($id)
    {
        // $items = Ongoing::select('ongoings.*')
        // ->join('customers','customers.id', '=','ongoings.customers_id')
        // ->join('users','users.customers_id', '=','customers.id')
        // ->with([
        //     'customer', 'Koinpack_product', 'groomer'
        //     ])
        //     ->where('ongoings.id', $id)
            
        //     // ->orderBy('created_at', 'DESC')
        //     ->get();
        $items = Ongoing::with([
            'customer', 'Koinpack_product', 'groomer'
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
            
        return view('pages.admin.invoice-Koinpack_product', [
            'items' => $items
        ]);
                
    }
}
