<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Koinpack_customer;
use App\Customer;
use App\User;
use App\Users;
use App\Koinpack_product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;
use Seshac\Otp\Otp;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CustomerRequest;
use Illuminate\Support\Facades\Hash;
use Alert;
use App\Coolze_order;
use App\Coolze_package;
use App\Coolze_voucher;
use App\Koinpack_wishlist;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Koinpack_customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            
        $items = Users::with([
            'customer'
            ])
            ->where('customers_id','!=', null)
            // ->where('status', 1)
            ->get();
        

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'data' => $items
                ], 200);
        }
        return view('pages.admin.customers-koinpack.index', [
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
        return view('pages.admin.customers-koinpack.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $request->validate([
            'email'             => 'unique:users',
            'phone'             => 'unique:users',
        ]);
        
        $data = $request->all();
        // dd($data['image']);
        $data['password'] = Hash::make($request->password);
        
        // $request->file('image') != null ? $data['image'] = $request->file('image')->store('assets/gallery', 'public') : null;
        $request->file('image') != null ? $data['image'] = $request->file('image')->store('assets/gallery', 'public') : null;
        
        try {
            $item = Users::create($data);
            $item->update([
                'customers_id'         => $item->id,
            ]);
            
            $item_customer = Koinpack_customer::create([
                'id'        => $item->id,
                'address'   => $data['address'],
                'long'      => $data['long'],
                'lat'       => $data['lat'],
            ]);
        } catch (QueryException $e) {
            if(\Request::segment(1) == 'api') {
                return response([
                    'status' => 'error',
                    'message' => 'Error save',
                    'data Customer' => $item,
                ], 401);
            }

            return back()->with('error', 'Error Create');
            // return back()->with('error', 'Error Create');
        }    

        if(\Request::segment(1) == 'api') {
            $item_new = Users::with([
                'customer'
            ])->where('id', $item->id)->get();
            return response()->json([
                'id'                => $item_new->first()->id,
                'image'              => $item_new->first()->image,
                'name'              => $item_new->first()->name,
                'email'             => $item_new->first()->email,
                'isVerified'        => $item_new->first()->isVerified,
                'phone'             => $item_new->first()->phone,
                'gender'            => $item_new->first()->gender,
                'day_of_birth'      => $item_new->first()->day_of_birth,
                'roles'             => $item_new->first()->roles,
                'status'            => $item_new->first()->status,
                'device_token'      => $item_new->first()->device_token,
                'address'           => $item_new->first()->customer->address,
                'long'              => $item_new->first()->customer->long,
                'lat'               => $item_new->first()->customer->lat,
                ], 200);          
        }
        Alert::success('Customer ', $item->name.' Create Successfully');           
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Users::with([
            'customer'
            ])
        ->findOrFail($id);

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'id'                => $item->id,
                'image'              => $item->image,
                'name'              => $item->name,
                'email'             => $item->email,
                'isVerified'        => $item->isVerified,
                'phone'             => $item->phone,
                'gender'             => $item->gender,
                'day_of_birth'      => $item->day_of_birth,
                'roles'             => $item->roles,
                'status'            => $item->status,
                'device_token'      => $item->device_token,
                'address'           => $item->customer->address,
                'long'              => $item->customer->long,
                'lat'               => $item->customer->lat,
                ], 200);
        }

        return view('pages.admin.users-customer.detail', [
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
        $item = Users::with([
            'customer'
        ])->findOrFail($id);

        return view('pages.admin.customers-koinpack.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {

        $request->validate([
            'email'             => 'unique:users,id,'.$id,
            'phone'             => 'unique:users,id,'.$id,
        ]);

        $item = Users::with([
            'customer'
        ])->findOrFail($id);

        $customer = Koinpack_customer::findOrFail($item->customer->id);

        if ($request->file('image') != null) {
            $path = $request->file('image')->store('assets/gallery', 'public');
            //delete image
            if(File::exists(('storage/'.$item->image))){
                File::delete('storage/'.$item->image);            
            }
        } else {
            $path = $item->image;
        }
        
        

        if($request->password != null && $request->password_confirmation != null){
            $pass = Hash::make($request->password);
        } else{
            $pass = $item->password;
        }
        
        try {
            $item_user = $item->update([
                    'image'         => $path,
                    'name'         => $request->name,
                    'email'        => $request->email,
                    'password'     => $pass,
                    'phone'        => $request->phone,
                    'gender'        => $request->gender,
                    'day_of_birth' => $request->day_of_birth,
                    'isVerified'   => $request->isVerified,
                    'roles'        => $request->roles,
                    'status'       => $request->status,
                ]);

         $item_customer = $customer->update([
                    'address'         => $request->address,
                    'long'            => $request->long,
                    'lat'             => $request->lat,
                ]);       
        } catch (QueryException $e) {
            if(\Request::segment(1) == 'api') {
                return response([
                    'status' => 'error',
                    'message' => $e,
                    // 'data lengkap customer'=>$item_cust
                ], 401);
            }
            return back()->with('error', 'Error Update');
        }  

        if(\Request::segment(1) == 'api') {
            $item_new = Users::with([
                'customer'
            ])->findOrFail($id);

            return response()->json([
                'id'                => $item_new->id,
                'image'              => $item_new->image,
                'name'              => $item_new->name,
                'email'             => $item_new->email,
                'isVerified'        => $item_new->isVerified,
                'phone'             => $item_new->phone,
                'day_of_birth'      => $item_new->day_of_birth,
                'roles'             => $item_new->roles,
                'status'            => $item_new->status,
                'gender'            => $item_new->gender,
                'device_token'      => $item_new->device_token,
                'address'           => $item_new->customer->address,
                'long'              => $item_new->customer->long,
                'lat'               => $item_new->customer->lat,
                ], 200);
        }
        Alert::success('Customer', $item->name.' Successfully Updated');            
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
    {
        $item = Users::with([
            'customer'
        ])
        ->findOrFail($id);
        
        if(File::exists(('storage/'.$item->image))){
            File::delete('storage/'.$item->image);            
        }

        $item->customer->delete();
        $item->delete();

        if(\Request::segment(1) == 'api') {
            return response([
                'success'           => true,
                'id'                => $item->id,
                'image'              => $item->image,
                'name'              => $item->name,
                'email'             => $item->email,
                'isVerified'        => $item->isVerified,
                'phone'             => $item->phone,
                'day_of_birth'      => $item->day_of_birth,
                'roles'             => $item->roles,
                'status'            => $item->status,
                'gender'            => $item->gender,
                'device_token'      => $item->device_token,
                'address'           => $item->customer->address,
                'long'              => $item->customer->long,
                'lat'               => $item->customer->lat,
            ], 200);
        }
        Alert::success('Customer ', $item->name.' Successfully Delete');        
        return redirect()->route('customers.index');
    }

    public function only_status($id)
    {
        $item = Users::with([
            'customer'
        ])
        ->findOrFail($id);
        // $partOrcust = Coolze_customer::findOrFail($id) ;        
        // $partOrcust = Coolze_partner::findOrFail($id);

        //delete image
        // if(File::exists(('storage/'.$item->image))){
        //     File::delete('storage/'.$item->image);            
        // }

        $item->update([
            'status' => 0,
        ]);
        // $item->delete();
        // $partOrcust->delete();

        if(\Request::segment(1) == 'api') {
            return response()->json([
                'id'                => $item->id,
                'image'              => $item->image,
                'name'              => $item->name,
                'email'             => $item->email,
                'isVerified'        => $item->isVerified,
                'phone'             => $item->phone,
                'day_of_birth'      => $item->day_of_birth,
                'roles'             => $item->roles,
                'status'            => $item->status,
                'gender'            => $item->gender,
                'device_token'      => $item->device_token,
                'address'           => $item->customer->address,
                'long'              => $item->customer->long,
                'lat'               => $item->customer->lat,
                ], 200);
        }
        Alert::success('Customer', $item->name.' Status Is Not Active');                
        return redirect()->route('customers.index');
    }

    

    

    public function restore()
    {
        // Alert::success('Berhasil menghapus data !')->persistent('Confirm');
        $resore_Soft_Delete = Customer::onlyTrashed();
        $resore_Soft_Delete->restore();
        // if(\Request::segment(1) == 'api') {
        //     return response()->json($resore_Soft_Delete, 200);
        // }
        // Alert::warning('Success Title','Success Restore ')->persistent('Close');
        return redirect()->route('users-customer.index');
    }

    public function profile($id)
    {
        $user = Users::with([
            'customer','wishlist','shopping_cart'
            ])->findOrFail($id);

            $jumlahOrgReview = 0;
            $avg = 0;
            $food =0;
        

            
        // if ($user->merchants_id) {
            
        //     $food = Adfood_food::with([
        //         'merchant','merchant_lengkap','category','gallery'
        //         ])
        //         ->where('merchants_id',$id)
        //         ->get();


        //         $total = [];
        //     if ($user->reservation_merchant) {
        //         $user_reservation = $user->reservation_merchant->where('rate', '!=', null);
        //         if (count($user_reservation) != 0) {
        //             foreach ($user_reservation as $item) {
        //                 $total[] = $item->rate;
        //             }
        //             $jumlahOrgReview = count($user_reservation);
        //             $hasilrete = array_sum($total);
        //         $avg = $hasilrete/$jumlahOrgReview;
        //         }
        //         else {
        //         $jumlahOrgReview = 0;
        //         $avg = 0;
        //         }
        //     } else {
        //         $jumlahOrgReview = 0;
        //         $avg = 0;
        //         }
        // } 
        
        
        
             
        return view('pages.admin.users.profile', [
            'user'                => $user,
            // 'wishlists'           => $wishlists,
            'food'                => $food,
            'jumlahOrgReview'     => $jumlahOrgReview,
            'avg'                 => $avg,


        ]);
    }

    // public function profile($id)
    // {
    //     $user = Users::with([
    //         'partner','customer', 'order_cust','order_part','order_drive','driver','address_cust','address_mitra'
    //         ])->findOrFail($id);
    //     $all_user = Users::with([
    //         'partner','customer', 'order_cust','order_part','order_drive','driver','address_cust','address_mitra'
    //         ])->get();
    //     $packages = Coolze_package::with([
    //         'subpackage'
    //     ])->get();

    //     $vouchers = Coolze_voucher::all();
        

    //         if(\Request::segment(1) == 'api') {
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'List Semua Profile',
    //                 'data' => $user
    //                 ], 200);
    //         }

    //         $jmlhcal = [];
            
    //         if ($user->partner != null) {
    //             $cust_mitra_driv = $user->partner;
    //             $address_user = $user->address_mitra;
    //             $order_user = $user->order_part;
                
    //             // count rete
    //             if ($user->order_part->where('isreviewed',1)->count() > 0) {
    //                 //total org review
    //                 $rate_user = $user->order_part->where('isreviewed',1)->count(); 
                    
    //                 //jumlah star (mengambil star)
    //                 $jumlah_stars = $user->order_part;
    //                 foreach ($jumlah_stars as $jumlah_star) {
    //                     $jmlhcal[] = $jumlah_star->rate;
    //                 }

    //                 //penjumlahan
    //                 $type_account = array_sum($jmlhcal)/$rate_user;
                    
    //             } else {
    //                 $type_account = null;
                    
    //             }
                
                
    //         } elseif ($user->customer != null) {
    //             $cust_mitra_driv = $user->customer;
    //             $address_user = $user->address_cust;
    //             $order_user = $user->order_cust;

    //             // count rete
    //             if ($user->order_cust->where('isreviewed',1)->count() > 0) {
    //                 //total org review
    //                 $rate_user = $user->order_cust->where('isreviewed',1)->count(); 
                    
    //                 //jumlah star (mengambil star)
    //                 $jumlah_stars = $user->order_cust;
    //                 foreach ($jumlah_stars as $jumlah_star) {
    //                     $jmlhcal[] = $jumlah_star->rate;
    //                 }
                    
    //                 //penjumlahan
    //                 $type_account = array_sum($jmlhcal)/$rate_user;
                    
    //             } else {
    //                 $type_account = null;
                    
    //             }

    //         } else {
    //             $cust_mitra_driv = $user->driver;
    //             $address_user = $user->driver->alamat ? $user->driver->alamat : '' ;
    //             $order_user = $user->order_drive;

    //             // count rete
    //             if ($user->order_drive->where('isreviewed',1)->count() > 0) {
    //                 //total org review
    //                 $rate_user = $user->order_drive->where('isreviewed',1)->count(); 
                    
    //                 //jumlah star (mengambil star)
    //                 $jumlah_stars = $user->order_drive;
    //                 foreach ($jumlah_stars as $jumlah_star) {
    //                     $jmlhcal[] = $jumlah_star->rate;
    //                 }

    //                 //penjumlahan
    //                 $type_account = array_sum($jmlhcal)/$rate_user;
                    
    //             } else {
    //                 $type_account = null;
                    
    //             }
    //         }
            
    //         // dd($type_account);

           
            
             
    //     return view('pages.admin.profile-coolze.index', [
    //         'user'            => $user,
    //         'cust_mitra_driv' => $cust_mitra_driv,
    //         'address_user'    => $address_user,
    //         'order_user'      => $order_user,
    //         'all_user'        => $all_user,
    //         'packages'        => $packages,
    //         'vouchers'        => $vouchers,
    //         'type_account'    => $type_account,
    //     ]);
        
        
    // }

    public function transaksi($id)
    {
        
        $items = Coolze_order::with([
            'customer','user_customer','alamat_customer','partner','user_partner','driver','voucher','package','subpackage'
            ])->where('customers_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Semua Transaction'.$id,
                    'data' => $items
                    ], 200);
            }
            
        return view('pages.admin.transactions-coolze.index', [
            'items' => $items
        ]);        
    }

    

    public function invoice($id)
    {
        
        $item = Coolze_order::with([
            'customer','user_customer','alamat_customer','partner','user_partner','driver','driver_personal','voucher','package','subpackage'
            ])->where('id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();    

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Semua Invoice',
                    'data' => $item
                    ], 200);
            }
            
        return view('pages.admin.invoice-coolze.index', [
                'item' => $item
            ]);
                
    }

    public function print($id)
    {
        
        $item = Coolze_order::with([
            'customer','user_customer','alamat_customer','partner','user_partner','driver','driver_personal','voucher','package','subpackage'
            ])->where('id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();    

            if(\Request::segment(1) == 'api') {
                return response()->json([
                    'success' => true,
                    'message' => 'List Semua Print',
                    'data' => $item
                    ], 200);
            }
            
        return view('pages.admin.invoice-coolze.print', [
                'item' => $item
            ]);
                
    }

    
}
