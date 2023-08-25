<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {
                if (Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) 
                {
                    return response()->json(['status' => $prod_check->name."This Product Already Added"]);
                }
                $wish = new Wishlist();
                $wish->prod_id = $product_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product Added to Wishlist Successfully"]);
            }
            else{
                 return response()->json(['status' => "Product Dosen't Exist"]);
             }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }

    }

    public function deleteitem($prod_id)
    {

        $wishlist = Wishlist::find($prod_id);
            $wishlist->delete();
            return redirect()->back()->with('status', "Product Deleted Successfully");


        // if (Auth::check()) {
        //     $prod_id = $request->input('prod_id');
        //         if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
        //             $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->find();
        //             $wish->delete();
        //             return response()->json(['status' => "Product Removed From Wishlist Successfully"]);
        //         }
        //     } else {
        //         return response()->json(['status' => "Login To Continue"]);
        // }
    }

    public function wishlistcount()
        {
            $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
            return response()->json(['count'=> $wishlistcount]);
        }
}
