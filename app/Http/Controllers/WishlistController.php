<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist.index', [
            'wishlist' => Wishlist::where('user_id', auth()->id())->get(),
        ]);
    }

    public function insert($product_id)
    {
        Wishlist::insert([
            'user_id'    => auth()->id(),
            'product_id' => $product_id,
            'created_at' => Carbon::now()
        ]);

        return back();
    }

    public function remove($wishlist_id)
    {
        Wishlist::find($wishlist_id)->delete();
        return back();
    }

    public function wlishlistCheck(Request $request)
    {

        $wishList = Wishlist::where('user_id', auth()->id())->where('product_id', $request->product_id)->exists();
        if(!$wishList){
            Wishlist::insert([
                'user_id'    => auth()->id(),
                'product_id' => $request->product_id,
                'created_at' => Carbon::now()
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Wishlist Updated'
            ]);
        }else{
            Wishlist::where('user_id', auth()->id())->where('product_id', $request->product_id)->delete();
            return response()->json([
                'status' => 400,
                'message' => 'Remove From Wishlist'
            ]);
        }
    }
}
