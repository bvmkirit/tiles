@extends('frontend-layout.frontend-auth')

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
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$product->name}}</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
