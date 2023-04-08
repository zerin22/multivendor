<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorNotification;
use App\Models\Product;
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
        $vendors = Vendor::latest()->paginate(10);
        return view('vendor.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        // return $request;
        // $random_password = Str::random(8);

        $request->validate([
            'vendor_name' => 'required',
            'vendor_email' => 'required|email|unique:users,email',
            'vendor_phone_number' => 'required',
            'vendor_address' => 'required',
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

        $vendor = new Vendor();
        $vendor->user_id = $user_info->id;
        $vendor->vendor_address = $request->vendor_address;
        if($request->inactive){
            $vendor->status = "inactive";
        }elseif($request->active){
            $vendor->status = "active";
        }

        $vendor->save();

        // Mail::to($request->vendor_email)->send(new VendorNotification($random_password));

        return redirect()->route('vendor.index')->with('success', 'Vendor Created Successfully');
    }

    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        $user_id = $vendor->user_id;
        $products = Product::where('user_id', $user_id)->latest()->paginate(10);
        return view('vendor.show', compact('vendor', 'products'));
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendor.edit', compact('vendor'));
    }

    public function update(Request $request,$id)
    {
        $user_id = Vendor::findOrFail($id)->user_id;

        // $random_password = Str::random(8);

        $request->validate([
            'vendor_name' => 'required',
            'vendor_email' => 'required|email|unique:users,email,'.$user_id,
            'vendor_phone_number' => 'required',
            'vendor_address' => 'required',
        ]);

        $user_info = User::findOrFail($user_id)->update([
            'name'       => $request->vendor_name,
            'email'      => $request->vendor_email,
            'phone'      => $request->vendor_phone_number,
            'created_at' => Carbon::now(),
        ]);

        $vendor = Vendor::findOrFail($id);
        $vendor->vendor_address = $request->vendor_address;
        if($request->inactive){
            $vendor->status = "inactive";
        }elseif($request->active){
            $vendor->status = "active";
        }

        $vendor->save();

        // Mail::to($request->vendor_email)->send(new VendorNotification($random_password));

        return redirect()->route('vendor.index')->with('success', 'Vendor Created Successfully');

    }

    public function destroy($id)
    {
        $user_id = Vendor::findOrFail($id)->user_id;
        $vendor = User::findOrFail($user_id);
        if($vendor->vendor_photo){
            unlink(base_path('public/uploads/vendor_photos/' . $vendor->vendor_photo));
        }
        $vendor->delete();
        // Vendor::find($id)->delete();
        return redirect()->back()->with('success', 'Vendor Deleted Successfully');
    }

    public function vendor_index()
    {
        return view('vendor.dashboard');
    }

    // public function showList(Request $request)
    // {
    //     // return $request;
    //     $vendors = Vendor::latest()->paginate($request->value);
    //     $view = view('vendor.renderPage', compact('vendors'));
    //     $data = $view->render();
    //     return response()->json(['data'=>$data]);
    // }

    public function makeInactive($id)
    {
       Vendor::findOrFail($id)->update(['status' => 'inactive']);
       return redirect()->back()->with('success', 'Vendor Inactive Successfully');
    }

    public function makeActive($id)
    {
       Vendor::findOrFail($id)->update(['status' => 'active']);
       return redirect()->back()->with('success', 'Vendor Active Successfully');
    }
}

