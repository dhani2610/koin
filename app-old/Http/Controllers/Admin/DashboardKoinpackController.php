<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
// use App\Helpers\StringHelper;
use Illuminate\Http\Request;

class DashboardKoinpackController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard-koinpack');
    }
    
}
