<?php

namespace App\Http\Controllers;

use App\Koinpack_location;
use App\CustomerService;
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

    public function indexAdmin(Request $request)
    {
        $data = CustomerService::get();
        return view('pages.admin.customers-koinpack.customer-support',[
            'data'  =>  $data
        ]);
    }

    public function store(Request $request)
    {
        // $locations = Koinpack_location::all();

        $data = new CustomerService();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->tlp = $request->tlp;
        $data->msg = $request->msg;
        $data->save();

        return redirect()->route('customer-support')->with('message', 'Success!');

    }
    public function changeStatus($id)
    {
        // $locations = Koinpack_location::all();

        $data = CustomerService::find($id);
        return view('pages.admin.customers-koinpack.edit-customer-support',[
            'data'  =>  $data
        ]);

    }
    public function changeStatuspost(Request $request,$id)
    {
        $data = CustomerService::find($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->route('customer-support-admin')->with('message', 'Success!');


    }
}
