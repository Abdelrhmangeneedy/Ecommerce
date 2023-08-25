<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Review;

class FrontendController extends Controller
{
    public function index()
    {
        $countcat = Category::count();
        $countprod = Product::count();
        $countuser = User::count();
        $countorder = Order::count();
       


        $monthuser = User::whereMonth('created_at', date('m'))->count();
        $user = User::whereMonth('created_at', date('m'))->get();
        $lmonthuser = User::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        $monthprod = Product::whereMonth('created_at', date('m'))->get();
        $lmonthprod = Product::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        $monthorder = Order::whereMonth('created_at', date('m'))->get();
        $lmonthorder = Order::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        return view(
            'admin.index',
            compact(
                'countcat',
                'countprod',
                'monthprod',
                'lmonthprod',
                'countuser',
                'monthuser',
                'user',
                'lmonthuser',
                'countorder',
                'monthorder',
                'lmonthorder',
            )
        );
    }
}
