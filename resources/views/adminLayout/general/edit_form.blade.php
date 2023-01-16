@extends('main')

@section('content')
    @php
        $title = $data['title'];
        $module = $data['module'];
        $resourcePath = $data['resourcePath'];
        $resourceRoute = $data['resourceRoute'];
        $url = $data['url'];
        $id = $data['edit']->id;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">  {{ $title }}</h3>
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @php
                            $index= route($resourceRoute.'.index');
//                            $store=route($resourceRoute.'.store');

                        @endphp
                        @include($resourcePath.'.edit', array('data' => $data['edit']))
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ $index }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
