@extends('frontend-layout.frontend-auth')
@section('title','Order List')
@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 200px;">
            <div class="col-lg-12">
                <div class="shoping__cart__table " style="border-radius: 15px;">
                    @foreach($orders as $order)
                        <div class="card text-white mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width:100%; background-color:transparent">
                            <div class="card-header "  style="border-radius: 5px; background-color: #7fad39;" >
                                <div class="container">
                                    <div class="row">
                                        <div class="col">Order no. : {{$order->order_no}}</div>
                                        <div class="col">Address : {{$order->address}}</div>
                                        <div class="col">Total : {{$order->total}}</div>
                                        <div class="col">Status : {{$order->status}}</div>
                                        <div class="col">Date : {{$order->order_date}}</div>
                                    </div>
                                </div>
                            </div>
                                <div class="shoping__cart__table">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="shoping__product">Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->orderItems as $orderItem)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img height="100" src="{{$orderItem->product->productImages()->first() ? asset($orderItem->product->productImages()->first()->image) : Null}}" alt="">

                                            </td>
                                            <td class="shoping__cart__item " >
                                                <h5>{{$orderItem->product->name}}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                ₹ {{$orderItem->product->price}}
                                            </td>
                                            <td class="shoping__cart__quantity" style="color: black">
                                                {{$orderItem->qty}}
                                            </td>
                                            <td class="shoping__cart__total ">
                                                ₹ <label class="cart_total_{{$orderItem->product_id}}">{{$orderItem->qty * $orderItem->product->price}}</label>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    @endforeach
                        {{$orders->links('frontend-layout.product.pagination')}}

                </div>
            </div>
        </div>
    </div>
@endsection

