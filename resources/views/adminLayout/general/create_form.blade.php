@extends('main')

@section('content')
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

                    <form action="{{$url}}" method="POST">
                        @csrf
                        @method('POST')
                        @php
                            $index= route($resourceRoute.'.index');
                            $store=route($resourceRoute.'.store');

                        @endphp
                        @include($resourcePath.'.create')
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
