<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(18)->get();
        $trending_category = Category::where('popular', '1')->get();
        
        return view('frontend.index', compact('featured_products', 'trending_category'));  
    }

    public function category()
    {
        $category = Category::all();
        return view('frontend.category', compact('category'));
    }
    public function viewcategory($name)
    {
        if (Category::where('name', $name)->exists()) {
            $category = Category::where('name', $name)->first();
            $product = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'product'));
        } else {
            return redirect('/')->with('status', 'This Category Dosen`t exists');
        }
    }
    public function viewproducts($prod_name)
    {
        if (Product::where('name', $prod_name)->exists()) {
            $product = Product::where('name', $prod_name)->first();
            return redirect('category/'.$product->category->name.'/'.$product->name);

        } else {
            return redirect('/')->with('status', 'This Category Dosen`t exists');
        }
    }
    public function viewproduct($cate_name, $prod_name)
    {
        if (Category::where('name', $cate_name)->exists()) {
            if ($product = Product::where('name', $prod_name)->exists()) {
                $product = Product::where('name', $prod_name)->first();
                
                $ratings = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();


                $reviews = Review::where('prod_id', $product->id)->get();

                if ($ratings->count() > 0) {

                    $rating_value = $rating_sum/$ratings->count();
                
                } else {
                    $rating_value = 0;
                }
                return view('frontend.products.view', compact('product','ratings','rating_value','user_rating' , 'reviews'));
            } else {
                return redirect('/')->with('status', 'This link is broken');
            }
        } else {
            return redirect('/')->with('status', 'This Product Dosen`t exists');
        }
    }

    
    public function productlistAjax()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function searchproduct(Request $request)
    {
        $searched_product = $request->product_name;
        if ($searched_product != "") {
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if ($product) {
                return redirect('category/'.$product->category->name.'/'.$product->name);
            } else {
                return redirect()->back()->with("status", "No Product matched Your Search");
            }
        } else {
            return redirect()->back();
        }
    }
}
