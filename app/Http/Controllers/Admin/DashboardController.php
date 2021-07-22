<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Str, DB, Auth;

class DashboardController extends Controller
{
    public function DashboardView(Request $request)
    {
            //redirect if not super admin


            return view('admin.dashboard.dashboard');

    }

    
}
