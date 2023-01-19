<div class="col-lg-9 col-md-7">
    <div class="product__discount">
        <div class="section-title product__discount__title">
            <h2>Latest Products</h2>
        </div>
        <div class="row">
            <div class="product__discount__slider owl-carousel">
                @foreach($subcategories as $subcategory)
                    <div class="col-lg-4">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg"
                                 data-setbg="{{asset('assets/front/img/product/discount/pd-1.jpg')}}">
                                {{--                                            <div class="product__discount__percent"></div>--}}
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                <span>{{$subcategory->name}}</span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
