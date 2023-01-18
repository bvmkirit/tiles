<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    public function index(){
        $categories = Category::where('parent_id', null)->get();
        $products = Product::latest()->limit(6)->get();
        return view('frontend-layout.shop',compact('categories','products'));
    }
}
