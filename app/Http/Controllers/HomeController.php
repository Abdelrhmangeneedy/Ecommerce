<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    // $featured_products = Product::where('trending', '1')->take(18)->get();
    // $trending_category = Category::where('popular', '1')->get();
    // return view('frontend.index', compact('featured_products', 'trending_category'));
    return view('home');
    }
}