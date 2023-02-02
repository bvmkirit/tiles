@extends('main')
@push('styles')
    <style>
        tbody, thead {
            text-align: center !important;
        }
    </style>
@endpush
@section('content')

    <div class="container-fluid">
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

                    <div> <select order_id="{{$order->id}}" class="form-control changeStatus"
                                    name="log_picker" style="width: 15%"
                                    data-style="form-control btn-secondary">
                            <option
                                value="Order Placed" {{(($order->status == 'Order Placed') ? 'selected' : Null)}}>
                                Order Placed
                            </option>
                            <option
                                value="Accepted" {{(($order->status == 'Accepted') ? 'selected' : Null)}}>
                                Accepted
                            </option>
                            <option
                                value="Completed" {{(($order->status == 'Completed') ? 'selected' : Null)}}>
                                Completed
                            </option>
                            <option
                                value="On the way" {{(($order->status == 'On the way') ? 'selected' : Null)}}>
                                On the way
                            </option>
                            <option
                                value="Delivered" {{(($order->status == 'Delivered') ? 'selected' : Null)}}>
                                Delivered
                            </option>
                        </select></div>

                    </thead>

                    <tbody>


                    </tbody>


                </table>
            </div>

        </div>


        <div class="card card-custom mt-5">
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


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($order->orderItems as $orderItem)
                        <tr>
                            <td>
                                <img height="100"
                                     src="{{$orderItem->product->productImages()->first() ? asset($orderItem->product->productImages()->first()->image) : Null}}"
                                     alt="">
                            </td>
                            <td>
                                <h5>{{$orderItem->product->name}}</h5>
                            </td>
                            <td>
                                ₹ {{$orderItem->price}}
                            </td>
                            <td>
                                {{$orderItem->qty}}
                            </td>
                            <td>

                                <select data-id="{{$orderItem->id}}" class="form-control changeStatusItem"
                                        name="log_picker"
                                        data-style="form-control btn-secondary">
                                    <option
                                        value="Order Placed" {{(($orderItem->status == 'Order Placed') ? 'selected' : Null)}}>
                                        Order Placed
                                    </option>
                                    <option
                                        value="Accepted" {{(($orderItem->status == 'Accepted') ? 'selected' : Null)}}>
                                        Accepted
                                    </option>
                                    <option
                                        value="Completed" {{(($orderItem->status == 'Completed') ? 'selected' : Null)}}>
                                        Completed
                                    </option>
                                    <option
                                        value="On the way" {{(($orderItem->status == 'On the way') ? 'selected' : Null)}}>
                                        On the way
                                    </option>
                                    <option
                                        value="Delivered" {{(($orderItem->status == 'Delivered') ? 'selected' : Null)}}>
                                        Delivered
                                    </option>
                                </select>

                            </td>
                            <td>
                                ₹ {{$orderItem->totalprice}}
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>


        <div class="card card-custom mt-5">

            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="datatable_rows">
                    <thead>
                    <tr>
                        <?php
                        $status = " ";
                        if ($order->status == 'Order Placed')
                            $status = "primary ";
                        else if ($order->status == 'Accepted')
                            $status = "warning";
                        else if ($order->status == 'Completed')
                            $status = "success";
                        else if ($order->status == 'On the way')
                            $status = "dark";
                        elseif ($order->status == 'Delivered')
                            $status = "info";
                        else
                            $status = "primary";
                        ?>

                        <div class="row" style="font-size: medium">
                            <div class="col-md-10">
                                <span class="label font-weight-bold label-lg  label-light-{{$status}} label-inline">Order Status :  {{$order->status}}</span>
                            </div>
                            <div class="col-md-2 text-right">Order Status : ₹{{$order->total}}</div>
                        </div>
                    </tr>
                    </thead>

                    <tbody>


                    </tbody>
                </table>
            </div>


        </div>

    </div>
@endsection
@push('scripts')
    <script>

        $(document).on('change', '.changeStatusItem', function () {

            var status = $(this).val();

            var orderitem_id = $(this).data('id');


            $.ajax({
                url: "{{route('order.orderitemstatus')}}",
                type: "POST",
                data: {
                    orderitem_id: orderitem_id,
                    status: status,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res)
                    if (res.status == 'success') {

                        toastr["success"](res.message, "Success");
                        location.reload();

                    } else {
                        toastr["error"](res.message, "Error");

                    }
                }
            });

        });
        $(document).on('change', '.changeStatus', function () {
            // console.log($(this).val())
            // console.log($(this).attr('order_id'));

            var status = $(this).val();
            var order_id = $(this).attr('order_id');
            var url = '{{url('admin/orders/orderstatus/')}}/'+ order_id ;

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    order_id: order_id,
                    status: status,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res)
                    if (res.status == 'success') {

                        toastr["success"](res.message, "Success");
                        location.reload();

                    } else {
                        toastr["error"](res.message, "Error");

                    }
                }
            });

        });

    </script>
@endpush
