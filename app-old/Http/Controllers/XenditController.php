<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use Carbon\Carbon;
use App\Koinpack_payment;

class XenditController extends Controller
{
    private $token = 'xnd_development_Soxulz0wj1T9NaGArfUqvotMhBZ29q3RlSXCnfwRRZukjt8aiWJdYD5URqpA91';
    public function index(Request $request)
    {
        return view('pages.aboutus');
    }

    public function getListVa()
    {
        // controller utk melihat list Virtual Account yang tersedia
        
        Xendit::setApiKey($this->token);
        $getVABanks = \Xendit\VirtualAccounts::getVABanks();

        return response()->json([
            'data'  => $getVABanks 
        ])-> setStatusCode(200);
        // hasilnya adl list virtual account yg dimiliki akun xendit kita (mode development)
    }

    public function createVa(Request $request)
    {
        Xendit::setApiKey($this->token);
        $external_id = 'va-'.time();

        $params = [
            "external_id" => $external_id,
        //    "bank_code" => "MANDIRI",
        //    "name" => "Ahmad"
            "bank_code" => $request->bank,
            "name" => $request->email,
            "expected_amount"   =>  $request->price,
            "is_closed"         => true,
            "expiration_date"   => \Carbon\Carbon::now()->addDays(1)->toISOString(),
            // 24 jam / 1 hari
            "is_single_use"         => true,
            //dibuat true agar virtual account langsung ga aktif setelah dibayar

        ];

        $createDb = Koinpack_payment::create([
            "external_id"    => $external_id,
            "payment_chanel" => 'Virtual Account',
            "email"          => $request->email,
            "price"          => $request->price,
            // "users_id"       => $request->users_id,
            // "products_id"       => $request->products_id,

        ]);
        
        $createVA = \Xendit\VirtualAccounts::create($params);
        return response()->json([
            'data'  => $createVA 
        ])-> setStatusCode(200);
    }

    public function callbackVa(Request $request)
    {
        $external_id = $request->external_id;
        $status = $request->status;
        $payment = Koinpack_payment::where('external_id', $external_id)->exists();
        if ($payment) {
            if ($status == 'ACTIVE') {
            $update = Koinpack_payment::where('external_id', $external_id)->update(['status' => 1]);
                if ($update > 0) {
                    return 'ok';
                } else {
                    return 'false';
                }
            }
        }
        else {
            return response()->json([
                'message'   => 'Data tidak ada'
            ]);
        }
    }
}
