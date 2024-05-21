<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function getAdminDashboard()
    {
        return view('admin.auth.dashboard');
    }
}
