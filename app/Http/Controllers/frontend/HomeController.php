<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;

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

    public function product(Request $request, $product)
    {
        $singleProduct = Product::where('name', str_replace('-', ' ', $product))->with('productImages', 'category', 'user')->first();
        $cart =  Auth::user() ? Cart::where(['product_id' => $singleProduct->id, 'user_id' => Auth::user()->id])->first() : Null;
        return view('frontend-layout.product.single-products', compact('singleProduct', 'cart'));
    }

    public function addCart(Request $request,)
    {
        $product = Product::findorFail($request->id);
        if (Auth::user()) {
            $cart = Cart::where(['product_id' => $product->id, 'user_id' => Auth::user()->id])->first();
            if ($cart) {
                if ($request->type == 'add' || $request->type ==  'inc') {
                    $cart->qty += 1;
                    $cart->save();
                } else {
                    if( $cart->qty ==1){
                        $cart->delete();
                        return response()->json(['status' => 'success', 'message' => 'Product added in cart','cart'=>Null]);

                    }else{
                        $cart->qty -= 1;
                        $cart->save();
                    }
                }
            } else {
                $cart = new Cart();
                $cart->product_id = $product->id;
                $cart->user_id = Auth::user()->id;
                $cart->qty = 1;
                $cart->price = $product->price;
                $cart->save();
            }

            if ($cart) {
                return response()->json(['status' => 'success', 'message' => 'Product added in cart','cart'=>$cart]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Something wrong','cart'=>Null]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something wrong','cart'=>Null]);
        }
    }
}
