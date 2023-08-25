<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        
            if (Auth::id()) {
             $product_id = $request->input('product_id');
             $stars_rated = $request->input('product_rating');
                $product_check = Product::where('id', $product_id)->where('status', '0')->first();
                        if ($product_check) {
                                $new_review = Rating::create([
                                        'user_id' => Auth::id(),
                                        'prod_id' => $product_id,
                                        'stars_rated' => $stars_rated,
                                ]);
                                if ($new_review) {
                                        return redirect()->back()->with('status', 'Thank You For Your Consedred Rating');
                                }
                        }
                         else {
                        return redirect()->back()->with('status', 'The Link You Followed Was broken');
                        }
            } else {
                return redirect('login')->with('status', 'Loged in First . Please !!');
            }
    }
       
}
        
        
        
        
        