@extends('main')

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h1 class="card-label"><b>Order Details</b></h1>
                    </div>


                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable_rows">
                        <thead>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    @foreach($orders as $order)
                                        <div class="row" style="font-size: medium">
                                            <div class="col-6" style="margin-bottom: 15px;">Customer name.
                                                : {{$order->user->name}}</div>
                                            <div class="col-6">Address. : {{$order->address}},
                                                City. : {{$order->city->name}},
                                                State. : {{$order->state->name}},
                                                Zipcode:{{$order->zipcode}}</div>
                                            <div class="col-6" style="margin-bottom: 15px">Phone
                                                no.: {{$order->phone}}</div>
                                            <div class="col-6">Order no.: {{$order->order_no}}</div>
                                            <div class="col-6">Order Date: {{$order->order_date}}</div>
                                            <div class="col-6">Order Note: {{$order->ordernote}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        </thead>

                        <tbody>


                        </tbody>


                    </table>
                </div>

            </div>

        </div>

    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Order Items</h3>
                    </div>


                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable_rows">
                        <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Status</th>
                            <th>Total Price</th>

                            <div class="row">
{{--                                @foreach($order->orderItems as $orderItem)--}}
{{--                                    <div class="col-3">Product name.: {{$orderItem->product->name}}</div>--}}
{{--                                    <div class="col-3">Order no.: {{$orderItem->qty}}</div>--}}
{{--                                    <div class="col-3">Price.: {{$orderItem->price}}</div>--}}
{{--                                    <div class="col-3">Total Price.: {{$orderItem->totalprice}}</div>--}}
{{--                                @endforeach--}}
                            </div>
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
                                    ₹ {{$orderItem->price}}
                                </td>
                                <td class="shoping__cart__quantity" style="color: black">
                                    {{$orderItem->qty}}
                                </td>
                                <td class="shoping__cart__item " >
                                    <h5>{{$orderItem->status}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ₹ {{$orderItem->totalprice}}
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">

                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable_rows">
                        <thead>
                        <tr>
                            <div class="row" style="font-size: medium">
                                    <div class="col-8">Order Status.: {{$order->status}}</div>
                                    <div class="col-4">Order Status.: {{$order->total}}</div>
                            </div>
                        </tr>
                        </thead>

                        <tbody>


                        </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>
@endsection
