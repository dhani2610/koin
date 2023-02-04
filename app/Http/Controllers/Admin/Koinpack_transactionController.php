<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Koinpack_payment;
use App\Users;
use App\Koinpack_product;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ShopingRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Alert;
use App\Koinpack_payment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Koinpack_transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Koinpack_payment::with([
        //     'product', 'customer','customer_full'
        // ])
        // ->whereHas('product')
        // ->whereHas('customer_full')
        // ->get();
        $items = Koinpack_payment::with([
            'customer','customer_full'
        ])->get();

        // $user= Auth::user()->roles;
        // dd($items);

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'success' => true,
                'data' => $items
                ], 200);
        }

        return view('pages.admin.transaction-koinpack.index', [
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
        // $products = Koinpack_product::all();

        return view('pages.admin.transaction-koinpack.create',[
            'users' => $users,
            // 'products' => $products,

        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name_category'         =>  'required|max:100|unique:koinpack_categories,name_category',
        // ]);
        
        $data = $request->all();
        $data['payment_chanel'] = 'Virtual Account';
        
        
        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);
        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
            ])->post('https://api.xendit.co/v2/invoices', [
                'external_id' => $external_id,
                'amount' => request('price')
            ]);
            
            $response = $data_request->object();
            // dd($response);
            $item = Koinpack_payment::create([
                "external_id"    => $external_id,
                "payment_chanel" => 'Virtual Account',
                "users_id"          => $request->users_id,
                "price"          => $request->price,
                "status"          => $response->status,
                'payment_link' => $response->invoice_url,
            ]);
            try {
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
        
        Alert::success('Transaction Created Successfully');        
        return redirect()->route('transactions.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Koinpack_payment::findOrFail($id);

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'success' => true,
                'data' => $item
                ], 200);
        }

        return view('pages.admin.transaction-koinpack.detail', [
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
        $item = Koinpack_payment::with([
            'product', 'customer','customer_full'
        ])
        ->findOrFail($id);

        $users = Users::where('customers_id','!=', null)->get();
        $products = Koinpack_product::all();

        return view('pages.admin.transaction-koinpack.edit', [
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
    public function update(ShopingRequest $request, $id)
    {
        
        // $request->validate([
        //     'name_category'         =>  'required|max:100|unique:koinpack_categories,name_category,'. $id,

        // ]);

        $data = $request->all();
        //$data['slug'] = Str::slug($request->title); //menambahkan slug, sebagai ID tapi lebih cantiknya
        // $request->file('foto') != null ? $data['foto'] = $request->file('foto')->store('assets/gallery', 'public') : $data['foto'] = null;

        // $request->file('image') != null ? $data['image'] = $request->file('image')->store('assets/gallery', 'public') : null;

        $item = Koinpack_payment::findOrFail($id);
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
        Alert::success('Transaction Updated Successfully ');           
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Koinpack_payment::findOrFail($id);
        
        $item->delete();

        if(\Request::segment(1) == 'api') {
            return response([
                'success' => True,
                'data' => $item
            ], 200);
        }
        Alert::success('Transaction Delete Successfully ');        
        return redirect()->route('transactions.index');
    }

    public function restore()
    {
        // Alert::success('Berhasil menghapus data !')->persistent('Confirm');
        $resore_Soft_Delete = Koinpack_payment::onlyTrashed();
        $resore_Soft_Delete->restore();
        // if(\Request::segment(1) == 'api') {
        //     return response()->json($resore_Soft_Delete, 200);
        // }
        // Alert::warning('Success Title','Success Restore ')->persistent('Close');
        return redirect()->route('services-transactions.index');
    }

    public function callback()
    {
        $data = request()->all();
        $status = $data['status']; //respon xendit
        $external_id = $data['external_id'];
        Koinpack_payment::where('external_id', $external_id)->update([
            'status' => $status
        ]);
        return response()->json($data);
    }
    
    

    public function profile($id)
    {
        $Koinpack_payment = Koinpack_payment::findOrFail($id);
        $ongoings = Ongoing::with([
            'customer', 'Koinpack_payment', 'groomer'
            ])->where('Koinpack_products_id', $id)
                // ->where('acc', '!=', null)
                ->orderBy('created_at', 'DESC')
                ->get();

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Semua Ongoing',
                    'data' => $ongoing, $Koinpack_payment
                    ], 200);
            }

        return view('pages.admin.profile-Koinpack_payment', [
            'Koinpack_payment' => $Koinpack_payment,
            'ongoings' => $ongoings
        ]);        
    }

    public function transaksi($id)
    {
        // $items = Ongoing::select('ongoings.*')
        // ->join('customers','customers.id', '=','ongoings.customers_id')
        // ->join('users','users.customers_id', '=','customers.id')
        // ->with([
        //     'customer', 'Koinpack_payment', 'groomer'
        //     ])
        //     ->where('ongoings.Koinpack_products_id', $id)
            
        //     ->orderBy('created_at', 'DESC')
        //     ->get();

        $items = Ongoing::with([
            'customer', 'Koinpack_payment', 'groomer'
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
            
        return view('pages.admin.transactions-Koinpack_payment', [
            'items' => $items
        ]);        
    }

    public function invoice($id)
    {
        // $items = Ongoing::select('ongoings.*')
        // ->join('customers','customers.id', '=','ongoings.customers_id')
        // ->join('users','users.customers_id', '=','customers.id')
        // ->with([
        //     'customer', 'Koinpack_payment', 'groomer'
        //     ])
        //     ->where('ongoings.id', $id)
            
        //     // ->orderBy('created_at', 'DESC')
        //     ->get();
        $items = Ongoing::with([
            'customer', 'Koinpack_payment', 'groomer'
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
            
        return view('pages.admin.invoice-Koinpack_payment', [
            'items' => $items
        ]);
                
    }
}
