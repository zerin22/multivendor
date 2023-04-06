<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        $random_password = Str::random(8);

        $request->validate([
            '*' => 'required',
        ]);

        $user_info = User::create([
            'name'       => $request->vendor_name,
            'email'      => $request->vendor_email,
            'phone'      => $request->vendor_phone_number,
            // 'password'   => bcrypt($random_password),
            'password'   => Hash::make('vendor@gmail.com'),
            'role'       => 3,
            'created_at' => Carbon::now(),
        ]);

        Vendor::insert([
            'user_id'        => $user_info->id,
            'vendor_address' => $request->vendor_address,
            'created_at'     => Carbon::now(),
        ]);
        // Mail::to($request->vendor_email)->send(new VendorNotification($random_password));

        return redirect()->route('vendor.index')->with('success', 'Vendor Created Successfully');
    }

    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendor.show', compact('vendor'));
    }

    public function destroy($id)
    {
        $user_id = Vendor::find($id)->user_id;
        $vendor = User::find($user_id);
        if($vendor->vendor_photo){
            unlink(base_path('public/uploads/vendor_photos/' . $vendor->vendor_photo));
        }
        $vendor->delete();
        Vendor::find($id)->delete();
        return back()->with('delete', 'Vendor Deleted Successfully');
    }

    public function vendor_index()
    {
        return view('vendor.dashboard');
    }
}
