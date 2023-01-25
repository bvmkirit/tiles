<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiles | @yield('title','Home')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/elegant-icons.css')}}" type="text/css">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <link rel="stylesheet" href="{{ asset('assets/front/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css')}}" type="text/css">
    <style>

        .header__menu ul li {
            list-style: none !important;
            display: inline-block !important;
            /*margin-right: 50px !important;*/
            margin-bottom: 2px !important;
            position: relative !important;
        }
        .treeview{
            width: 100% !important;
        }
        li.treeview ul{
            margin-left: 180px !important;
            margin-top: -25px !important;
            Position: fixed !important;
            display: none;
        }
        li.treeview:hover ul {
            display: flex !important;
            flex-direction: column;
            color: #222222 !important;
            transition: 0.5s !important;
            background-color: #222222 !important;
        }

        .header__menu ul li .header__menu__dropdown li a {

            text-transform: capitalize !important;
            color: #ffffff !important;
            font-weight: 400 !important;
            padding: 10px 10px 10px 10px !important;
        }

    </style>
</head>

<body>
<div id="wrapper-container">

    <header >
        <div class="header-container">
            @include('frontend-layout.bottom-header')
            @include('frontend-layout.top-header')
        </div>
    </header>

{{--    @include('frontend-layout.mobile-nav')--}}




        @yield('content')

        @include('frontend-layout.footer')


{{--    <div id="thim-preloading">--}}
{{--        <div class="custom-image">--}}
{{--            <img src="{{asset('assets/front/images/wave.gif')}}" alt="Loading">--}}
{{--        </div>--}}
{{--    </div>--}}
</div>


<!-- Js Plugins -->
<script src="{{ asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/front/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('assets/front/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/front/js/jquery.slicknav.js')}}"></script>
<script src="{{ asset('assets/front/js/mixitup.min.js')}}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/front/js/main.js')}}"></script>
<script src="{{ asset('assets/js/validate.js')}}"></script>
@stack('scripts')
</body>

</html>
