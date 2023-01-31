@php
    $menus = menus();
@endphp
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{route('front.home')}}"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="{{Auth::user() ? route('front.orderList') : route('front-login')}}"><i class="fa fa-shopping-bag"></i> </a></li>
            <li><a href="{{Auth::user() ? route('front.listCart') : route('front-login')}}"><i class="fa fa-shopping-cart"></i> <span>{{Auth::user() ? \App\Models\Cart::where('user_id',Auth::user()->id)->count(): 0}}</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">

        <div class="header__top__right__auth">
            @guest
                <a href="{{route('front-login')}}">
                    Login
                </a>
            @else
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{route('logout')}}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            @endif
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{route('front.home')}}">Home</a></li>
            <li>
                <a href="#">Products</a>
                <ul class="header__menu__dropdown">
                    @foreach($menus as $menu)
                        <li class="treeview"><a href="#">{{$menu->name}}</a>
                            @if(count($menu->subCategories) > 0)
                                <ul class="treeview-menu">
                                    @foreach($menu->subCategories as $subCategory)
                                        <li><a href="{{route('front.products',['category'=> str_replace(' ','-',$subCategory->parentCategory->name),'subcategory'=>str_replace(' ','-',$subCategory->name)])}}">{{$subCategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="/blog">Dealers</a></li>
            <li><a href="/blog">Manufacturers</a></li>
            <li><a href="/blog">Transporter</a></li>
            <li><a href="/blog">Workers</a></li>
            <li><a href="/blog">About</a></li>
            <li><a href="./contact.html">Contact</a></li>
            <li><a href="./contact.html">Join Us</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>


<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> {{setWebsite('website_email')}} </li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{setWebsite('facebook_url')}} "><i class="fa fa-facebook"></i></a>
                            <a href="{{setWebsite('twitter_url')}} "><i class="fa fa-twitter"></i></a>
                            <a href="{{setWebsite('telegram_url')}} "><i class="fa fa-telegram"></i></a>
                            <a href="{{setWebsite('instagram_url')}} "><i class="fa fa-instagram"></i></a>
                        </div>


                        @guest
                            <div class="header__top__right__auth">
                                <a href="{{route('front-login')}}">
                                    Login
                                </a></div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="{{route('logout')}}"
                                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{route('logout')}}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{route('front.home')}}"><img src="{{asset('assets/front/img/logo.png')}}" alt="IMG"></a>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('front.home')}}">Home</a></li>
                        <li><a href="#">Products</a>
                            <ul class="header__menu__dropdown">
                                @foreach($menus as $menu)
                                    <li class="treeview"><a href="#">{{$menu->name}}</a>
                                        @if(count($menu->subCategories) > 0)
                                            <ul class="treeview-menu">
                                                @foreach($menu->subCategories as $subCategory)
                                                    <li><a href="{{route('front.products',['category'=> str_replace(' ','-',$subCategory->parentCategory->name),'subcategory'=>str_replace(' ','-',$subCategory->name)])}}">{{$subCategory->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="/blog">Dealers</a></li>
                        <li><a href="/blog">Manufacturers</a></li>
                        <li><a href="/blog">Transporter</a></li>
                        <li><a href="/blog">Workers</a></li>
                        <li><a href="/blog">About</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a href="./contact.html">Join Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{Auth::user() ? route('front.orderList') : route('front-login')}}"><i class="fa fa-shopping-bag"></i> </a></li>
                        <li><a href="{{Auth::user() ? route('front.listCart') : route('front-login')}}"><i class="fa fa-shopping-cart"></i> <span>{{ Auth::user() ? \App\Models\Cart::where('user_id',Auth::user()->id)->count() : 0}}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

