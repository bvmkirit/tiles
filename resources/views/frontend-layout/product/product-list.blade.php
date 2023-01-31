
<div class="filter__item">
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="filter__found">
                <h6><span>{{count($products)}}</span> Categories found</h6>
            </div>
        </div>
        <div class="col-lg-4 col-md-3">

        </div>
    </div>
</div>
<div class="row">
    @foreach($products as $product)
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg">
                <img src="{{asset($product->image)}}" />
                <ul class="product__item__pic__hover">
{{--                    <li><a href="#"><i class="fa fa-heart"></i></a></li>--}}
                    <li><a href="{{route('front.products',['category'=> str_replace(' ','-',$product->parentCategory->name),'subcategory'=>str_replace(' ','-',$product->name)])}}"><i class="fa fa-eye"></i></a></li>
{{--                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="#">{{$product->name}}</a></h6>
{{--                <h5>$30.00</h5>--}}
            </div>
        </div>
    </div>
    @endforeach
</div>

{{$products->links('frontend-layout.product.pagination')}}
