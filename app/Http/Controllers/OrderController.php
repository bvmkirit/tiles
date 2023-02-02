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
                ->addColumn('statusChange', function ($row) {

                    $html = "<select order_id='{$row->id}' class='changeStatus form-control' data-id='" . $row->id . "'> ";
                    $html .= "<option value='Order Placed' " . (($row->status == 'Order Placed') ? 'selected' : Null) . "> Order Placed  </option>";
                    $html .= "<option value='Accepted' " . (($row->status == 'Accepted') ? 'selected' : Null) . "> Accepted </option>";
                    $html .= "<option value='Completed' " . (($row->status == 'Completed') ? 'selected' : Null) . "> Completed </option>";
                    $html .= "<option value='On the way' " . (($row->status == 'On the way') ? 'selected' : Null) . "> On the way </option>";
                    $html .= "<option value='Delivered' " . (($row->status == 'Delivered') ? 'selected' : Null) . "> Delivered </option>";
                    $html .= "</select>";

                    return $html;

                })
                ->rawColumns(['state_id', 'action', 'statusChange'])
                ->make(true);

        }
        return view('admin.order.index');

    }
    public function show(Request $request, $id){
        $order_id=$id;
        $orders = Order::where("id",$id)->with('orderItems','state','city','user','orderItems.product','orderItems.product.productImages')->get();
//        dd($order);
        return view ('admin.order.show_order_item',compact('orders', 'order_id'));

    }

    public function changestatus(Request $request, $id)
    {
       $order= Order::where("id",$id)->update(['status' => $request->status]);
        if ($order){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error']);
        }
    }

    public function orderitemstatus(Request $request)
    {
        $order= OrderItem::where("id",$request->orderitem_id)->update(['status' => $request->status]);
        if ($order){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error']);
        }
    }
}
