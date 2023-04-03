<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (strpos(url()->previous(), 'product/details')) {
            return redirect(url()->previous());
        }
        $total_users     = User::count();
        $total_customers = User::where('role', 1)->count();
        $total_admins    = User::where('role', 2)->count();
        $total_vendors   = User::where('role', 3)->count();

        return view('admin.admin_dashboard', compact('total_users', 'total_admins', 'total_customers', 'total_vendors'));

    }
}
