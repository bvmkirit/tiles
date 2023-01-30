@extends('main')

@section('content')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline mr-5">
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Orders</h5>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Lists</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Orders</h3>
                    </div>


                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable_rows">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Order_no</th>
                            <th>address</th>
{{--                            <th>City</th>--}}
{{--                            <th>State</th>--}}
{{--                            <th>Zipcode</th>--}}
{{--                            <th>Phone</th>--}}
                            <th>Ordernote</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Orderdate</th>
                            <th>Action</th>
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
@push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script>

        $(document).ready(function () {

            $('#datatable_rows').DataTable({

                processing: true,
                serverSide: true,
                "dom": '<"top"if>rt<"bottom"lp><"clear">',
                searchable: true,

                scrollX: true,

                order: [0, false],

                ajax: "{{ route('orders.index') }}",

                columns: [


                    {
                        orderable: true,

                        searchable: true,

                        "data": "id"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "user_id"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "order_no"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "address"

                    },
                    // {
                    //     orderable: true,
                    //
                    //     searchable: true,
                    //
                    //     "data": "city_id"
                    //
                    // },
                    //
                    // {
                    //     orderable: true,
                    //
                    //     searchable: true,
                    //
                    //     "data": "state_id"
                    //
                    // },
                    // {
                    //     orderable: true,
                    //
                    //     searchable: true,
                    //
                    //     "data": "zipcode"
                    //
                    // },
                    // {
                    //     orderable: true,
                    //
                    //     searchable: true,
                    //
                    //     "data": "phone"
                    //
                    // },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "ordernote"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "status"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "total"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "order_date"

                    },

                    {
                        orderable: true,

                        searchable: true,

                        "data": "action"

                    },

                ]

            });
        });
    </script>
@endpush
