<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller

{
    public function index(){
        $categories = Category::where('parent_id', null)->get();
        $products = Product::latest()->limit(6)->get();
        return view('frontend-layout.shop',compact('categories','products'));
    }

    public function subcategory(Request $request){
        $categories= Category::where('parent_id',$request->id)->paginate(10);
        if($categories){
            return response()->json(['status'=>'success','message'=>'Commented','renderData'=>view('frontend-layout.product.product-list')->with('products', $categories)->render()]);
        }else{
            return response()->json(['status'=>'error','message'=>'Commented',]);
        }
    }
    public function products(Request $request, $cat, $subCat){
        $categoryProduct=Category::where('name',str_replace('-',' ',$subCat))->with('subcategories','subcategories.products')->first();

        $products= Product::wherehas('category',function ($query) use ( $categoryProduct){
            $query->where('parent_id',$categoryProduct->id);
        })->get();

        return view('frontend-layout.product.category-product-list',compact('categoryProduct','products'));
    }
}
