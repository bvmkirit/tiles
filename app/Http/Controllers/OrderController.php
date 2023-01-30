<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class OrderController extends Controller
{

    public function __construct(Product $s)
    {
        $this->view = 'admin.order';
        $this->route = 'orders';
        $this->viewName = 'Product';
    }


    public function index(Request $request){
        if ($request->ajax()) {

            $query = Order::with('state','city','user')->get();
            return DataTables::of($query)
                ->addColumn('state_id', function ($row) {
                    return $row->state_id ?  $row->state->name : '-';
                })

                ->addColumn('user_id', function ($row) {
                    return $row->user->name;
                })

                ->addColumn('city_id', function ($row) {
                    return $row->city_id ?  $row->city->name : '-';
                })
                ->setRowClass(function () {
                    return 'row-move';
                })
                ->setRowId(function ($row) {
                    return 'row-' . $row->id;
                })

                ->addColumn('action', function ($row) {
                    $btn = view('admin.order.orderactionbtn')->with(['id' => $row->id, 'route' => $this->route])->render();
                    return $btn;

                })
                ->rawColumns(['state_id','action'])
                ->make(true);

        }
        return view ('admin.order.index');

    }
    public function show(Request $request, $id){
        $orders = Order::where("id",$id)->with('orderItems','state','city','user','orderItems.product','orderItems.product.productImages')->get();
//        dd($order);
        return view ('admin.order.show_order_item',compact('orders'));

    }
}
