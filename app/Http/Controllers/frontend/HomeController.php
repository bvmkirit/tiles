<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    public function index(){
        $categories = Category::where('parent_id', null)->get();
        return view('frontend-layout.shop',compact('categories'));
    }
}
