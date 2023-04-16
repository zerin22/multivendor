<?php

namespace App\Http\Controllers;

use App\Models\Billing_details;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Order_detail;
use App\Models\Order_summery;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\State;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        Session::put('s_shipping_total', $request->shipping);

        // return $countries = Country::where('status', 'active')->get(['id', 'name']);

        if (strpos(url()->previous(), 'cart') || strpos(url()->previous(), 'checkout')) {
            return view('frontend.checkout', [
                'countries' => Country::where('status', 'active')->get(['id', 'name']),
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function checkout_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postcode' => 'required',
        ]);

       $order_summery_id = Order_summery::insertGetId([
            'user_id' => auth()->id(),
            'cart_total' => session('s_cart_total'),
            'discount_total' => session('s_discount_total'),
            'sub_total' => session('s_cart_total') - session('s_discount_total'),
            'shipping_total' => session('s_shipping_total'),
            'grand_total' => session('s_cart_total') - session('s_discount_total') + session('s_shipping_total'),
            'payment_option' => $request->payment_option,
            'coupon_name' => session('s_coupon_name'),
            'created_at' => Carbon::now()
        ]);


        // Billing_details::insert([
        //     'order_summery_id' => $order_summery_id,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'country_id' => $request->country,
        //     'state_id' => $request->state,
        //     'city_id' => $request->city,
        //     'address' => $request->address,
        //     'postcode' => $request->postcode,
        //     'order_notes' => $request->message
        // ]);

        foreach (allcarts() as $cart) {
            Order_detail::insertGetId([
                'order_summery_id' => $order_summery_id,
                'vendor_id' => $cart->vendor_id,
                'product_id' => $cart->product_id,
                'amount' => $cart->amount,
                'created_at' => Carbon::now()
            ]);

            Product::find($cart->product_id)->decrement('product_quantity', $cart->amount);
        }



        $order = new Order();
        $order->order_summery_id = $order_summery_id;
        // $order->order_details_id = $order_details_id;
        $order->user_id = auth()->id();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->country_id = $request->country;
        $order->state_id = $request->state;
        $order->city_id = $request->city;
        $order->address = $request->address;
        $order->postcode = $request->postcode;
        $order->message = $request->message;
        $order->save();

        if (session('s_coupon_name')) {
            Coupon::where('coupon_name', session('s_coupon_name'))->decrement('limit', 1);
        }

        if ($request->payment_option == 0)
        {
            Cart::where('user_id', Auth()->id())->delete();
            return redirect('/')->with('success', 'Purchase Successfull');

        }else {
            Session::put('s_order_summery_id', $order_summery_id);
            return redirect('/pay');
        }
    }

    public function get_states(Request $request)
    {
        $show_state = "<option value=''>Select State</option>";
        $states = State::where('country_id', $request->country_id)->where('status', 'active')->get(['id', 'name']);
        foreach ($states as $state) {
            // echo $city->name .= "<option value='$city->id'>$city->name</option>";
            $show_state .= "<option value='$state->id'>$state->name</option>";
        }
        return $show_state;
    }

    public function get_cities(Request $request)
    {
        $show_city = "<option value=''>Select City</option>";
        $cities = City::where('state_id', $request->state_id)->where('status', 'active')->get(['id', 'name']);
        foreach ($cities as $city) {
            // echo $city->name .= "<option value='$city->id'>$city->name</option>";
            $show_city .= "<option value='$city->id'>$city->name</option>";
        }
        return $show_city;
    }
}
