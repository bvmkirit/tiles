@extends('main')

@section('content')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline mr-5">
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Category</h5>
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
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Category</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline mr-2">

                        </div>
                        <a href="{{route('categories.create')}}" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"/>
													</g>
												</svg>
											</span>New Record</a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable_rows">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
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

                ajax: "{{ route('categories.index') }}",

                columns: [


                    {
                        orderable: true,

                        searchable: true,

                        "data": "id"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "name"

                    },
                    {
                        orderable: true,

                        searchable: true,

                        "data": "parent_id"

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
