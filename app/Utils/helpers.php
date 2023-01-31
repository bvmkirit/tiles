<?php
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
function setImage($file,$folder,$type=null){
    if($type == 'edit'){
    }
    $filename = $folder .'-'. rand() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path($folder), $filename);
    return  $folder.'/'.$filename;
}

function setWebsite($type){
    $data = Setting::first()->value($type);
    return $data;
}


function menus(){
    $categories = Category::where('parent_id', null)->with('subCategories')->get();
    return $categories;
}

function totalUsers($role){
    $users = User::where('role',$role)->count();
    return $users;
}

function totalProducts($category = null){
    $products = \App\Models\Product::count();
    return $products;
}

function totalOrders($revenue = false){
    $orders = \App\Models\Order::count();
    if($revenue){
        $orders = \App\Models\Order::sum('total');

    }
    return $orders;
}
