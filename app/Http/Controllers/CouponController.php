<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponForm;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $coupons = Coupon::latest()->paginate(10);
        return view('coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('coupon.create');
    }

    public function store(CouponForm $request)
    {
        // Validate using CouponForm
        Coupon::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Coupon added successfully');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('coupon.edit', compact('coupon'));
    }

    public function update(CouponForm $request, Coupon $coupon)
    {
        $coupon->coupon_name = $request->coupon_name;
        $coupon->discount = $request->discount;
        $coupon->validity = $request->validity;
        $coupon->limit = $request->limit;
        $coupon->save();
        return redirect()->route('coupon.index')->with('success', 'Coupon updated successfully');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->with('success', 'Coupon deleted successfully');
    }
}
