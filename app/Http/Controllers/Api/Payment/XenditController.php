<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Xendit\Xendit;

class XenditController extends Controller
{
    private $token = 'xnd_development_Soxulz0wj1T9NaGArfUqvotMhBZ29q3RlSXCnfwRRZukjt8aiWJdYD5URqpA91';
    
    public function getListVa()
    {
        Xendit::setApiKey($this->token);
        return response()->json(['data' => 'a'])-> setStatusCode(200);
        // controller utk melihat list Virtual Account yang tersedia

        $getVABanks = \Xendit\VirtualAccounts::getVABanks();

        return response()->json([
            'data'  => $getVABanks 
        ])-> setStatusCode(200);
    }
}
