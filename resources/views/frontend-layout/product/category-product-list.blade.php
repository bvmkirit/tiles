@extends('frontend-layout.frontend-auth')
@section('title',$categoryProduct->name)
@section('content')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            @if(count($categoryProduct->subCategories) > 0)
                            <li class="active" data-filter="*">All</li>
                            @foreach($categoryProduct->subCategories as $subCategory)
                            <li data-filter=".{{str_replace(' ','-',$subCategory->name)}}">{{$subCategory->name}}</li>
                            @endforeach
                            @else
                                No Data Found
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" id="MixItUp0D6016">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{str_replace(' ','-',$product->category->name)}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset($product->productImages->first()->image)}}" style="background-image: url({{asset($product->productImages->first()->image)}});">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li>
                                    <a href="{{route('front.product',['product'=> str_replace(' ','-', $product->name)])}}" data-id="{{$product->id}}"><i class="fa fa-eye" ></i></a></li>
                                <li>@if(Auth::user() )
                                        <a href="#" class="addCart" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                                    @else
                                        <a href="{{route('front-login')}}" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$product->name}}</a></h6>
                            <h5>₹ {{$product->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.addCart').on("click", function (e) {
                var id = $(this).data('id');
                $.ajax({

                    type: "POST",

                    url: "{{route('front.addCart')}}",

                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': id,
                        'type':'add'
                    },

                    cache: false,

                    success: function (data) {

                        if (data.status === 'success') {
                            // $('.cat-item').css('color', '#000000')
                            // $('#active-' + id).css('color', '#e40914')
                            // $('.episodeName').html(data.episode.title)



                        } else if (data.status === 'error') {
                            location.reload();

                            toastr["error"]("Something went wrong", "Error");

                        } else if (data.status === 'type_code') {

                            toastr["error"]("Duplicate code!", "Error");

                            $('.change_button').prop('disabled', false);

                            $('.change_button').find('.change_spin').addClass('d-none');
                        } else if (data.status === 'email_exists') {
                            toastr["error"]("Duplicate Email!", "Error");
                            // location.reload();
                            $('.change_button').prop('disabled', false);
                            $('.change_button').find('.change_spin').addClass('d-none');
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
