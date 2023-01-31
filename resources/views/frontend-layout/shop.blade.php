@extends('frontend-layout.frontend-auth')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/front/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Product</h4>
                            <ul>
                                @foreach($categories as $category )
                                    <li><a href="javascript:;" data-id="{{$category->id}}" class="categoryChange">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7 changeCategoryData">
                    @if($categories->first())
                    @include('frontend-layout.product.product-list',['products'=>$categories->first()->subCategories()->paginate(10)])
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.categoryChange').on("click", function (e) {
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{route('front.subcategory')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': id,
                    },
                    cache: false,
                    success: function (data) {
                        if (data.status === 'success') {
                            $('.changeCategoryData').html("")
                            $('.changeCategoryData').html(data.renderData)
                        } else {
                            location.reload();
                            toastr["error"]("Something went wrong", "Error");
                        }
                    },
                    error: function (data) {
                        console.log(data.status)
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (key, value) {
                                console.log(key + " " + value);
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parent().append('<div id="' + key + '-error" class="error invalid-feedback ">' + value + '</div>');
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush
