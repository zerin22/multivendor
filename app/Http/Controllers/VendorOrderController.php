<?php

namespace App\Http\Controllers;

use App\Models\Billing_details;
use App\Models\Order_detail;
use App\Models\Order_summery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_orders = Order_detail::where('vendor_id', Auth::id())->select('order_summery_id')->distinct()->get();
        return view('singleVendorOrder.index_vendor_order', compact('all_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order_summery::findOrFail($id);
        $billing_detail = Billing_details::where('order_summery_id', $id)->first();
        $order_details = Order_detail::where('order_summery_id', $id)->get();
        return view('singleVendorOrder.show_vendor_order', compact('order', 'billing_detail', 'order_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function order_status_change(Request $request)
    {
        Order_summery::findOrFail($request->status_id)->update(['delivered_status' => $request->status]);
        return response()->json();
    }

}
