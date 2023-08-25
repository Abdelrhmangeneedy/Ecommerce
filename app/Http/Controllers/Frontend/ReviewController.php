<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
public function create(Request $request)
    {
        
        if (Auth::id()) {
            $product_id = $request->input('product_id');
            $product_check = Product::where('id', $product_id)->where('status', '0')->first();
            if ($product_check) {
                $user_review = $request->input('user_review');
                $new_review = Review::create([
                    'user_id' => Auth::id(),
                    'prod_id' => $product_id,
                    'user_review' => $user_review,
                ]);
                if ($new_review) {
                    return redirect()->back()->with('status', 'Thank You For Your Consedred Opinion');
                }
            } else {
                return redirect()->back()->with('status', 'The Link You Followed Was broken');
            }
        } else {
            return redirect('login')->with('status', 'Loged in First . Please !!');
        }
    }

    
    public function edit($product_name)
    {

        $product = Product::where('name', $product_name)->where('status', '0')->first();
        if ($product) {
            $product_id  =  $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            }
            else {

                return redirect()->back()->with('status', 'The Link You Followed Is broken');
            }
        }
        else {
            return redirect()->back()->with('status', 'The Link You Followed Is broken');
        }
    }
    
    
    public function update(Request $request)
    {      
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {

                $review->user_review = $request->input('user_review');
                $review->update();

                return redirect()->back()->with('status', 'Your Review Update Successfully');
            }
            else {

                return redirect()->back()->with('status', 'The Link You Followed Is broken');
            }
        
    }

}
