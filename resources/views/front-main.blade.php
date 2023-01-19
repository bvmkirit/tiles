@extends('frontend-layout.frontend-auth')

{{--@push('custom_css')--}}
{{--    <link href="('https://fonts.googleapis.com/css2?family=Lato:wght@100;900&display=swap" rel="stylesheet">--}}

{{--@endpush--}}

@section('content')

    {{--    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
    {{--        <ol class="carousel-indicators">--}}
    {{--            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
    {{--            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
    {{--            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
    {{--        </ol>--}}
    {{--        <div class="carousel-inner image">--}}
    {{--            <div class="carousel-item active">--}}
    {{--                <img src="https://wallpapershome.com/images/pages/ico_h/24322.jpg" class="d-block w-100" alt="...">--}}
    {{--                <div class="carousel-caption d-none d-md-block" style="margin-bottom: 42%; text-align: left; font-size:3.5em;font-weight: 400;">--}}
    {{--                    <h1><b>Hello User</b></h1>--}}
    {{--                    <p>Your First picture here</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="carousel-item">--}}
    {{--                <img src="https://wallpaperaccess.com/full/51364.jpg" class="d-block w-100" alt="...">--}}
    {{--                <div class="carousel-caption d-none d-md-block" style="margin-bottom: 42%; text-align: left; font-size:3.5em;font-weight: 400;">--}}
    {{--                    <h1><b>Hello User</b></h1>--}}
    {{--                    <p>Your Second picture here</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="carousel-item">--}}
    {{--                <img src="https://wallpapers.com/images/hd/hd-sunset-at-beach-w5ped7x6g3uo2o76.jpg" class="d-block w-100" alt="...">--}}
    {{--                <div class="carousel-caption d-none d-md-block" style="margin-bottom: 42%; text-align: left; font-size:3.5em;font-weight: 400;">--}}
    {{--                    <h1><b>Hello User</b></h1>--}}
    {{--                    <p>Your Third picture here</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="carousel-item">--}}
    {{--                <img src="https://i.pinimg.com/originals/dd/c6/0b/ddc60bde3f9ed3b4737caa2d2bf37440.jpg" class="d-block w-100" alt="...">--}}
    {{--                <div class="carousel-caption d-none d-md-block" style="margin-bottom: 42%; text-align: left; font-size:3.5em;font-weight: 400;">--}}
    {{--                    <h1><b>Hello User</b></h1>--}}
    {{--                    <p>Your Fourth picture here</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">--}}
    {{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
    {{--            <span class="sr-only">Previous</span>--}}
    {{--        </button>--}}
    {{--        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">--}}
    {{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
    {{--            <span class="sr-only">Next</span>--}}
    {{--        </button>--}}
    {{--    </div>--}}


    {{--    <div class="thim-banner_home-1" style="background-image: url(frontend/assets/images/bg-01.jpg);">--}}
    {{--        <div class="overlay-area"></div>--}}
    {{--        <div class="container">--}}

    {{--            <div class="bp-element bp-element-st-list-videos vblog-layout-1">--}}
    {{--                <div class="wrap-element">--}}
    {{--                    <div class="feature-item">--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-lg-9">--}}
    {{--                                <div class="video">--}}
    {{--                                    <img src="{{asset('frontend/assets/images/bg-featurepost-01.jpg')}}" alt="IMG">--}}
    {{--                                    <div class="overlay"></div>--}}
    {{--                                    <div class="meta-info">--}}
    {{--                                        <div class="imdb">--}}
    {{--                                            <span class="value">5</span>IMDb--}}
    {{--                                        </div>--}}
    {{--                                        <div class="label">--}}
    {{--                                            HDRip--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <a href="https://www.youtube.com/watch?v=hNQFjqDvPhA&amp;feature=youtu.be"--}}
    {{--                                       class="btn-play popup-youtube">--}}
    {{--                                    </a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-3">--}}
    {{--                                <div class="text">--}}
    {{--                                    <h4 class="title">--}}
    {{--                                        <a href="#">--}}
    {{--                                            MTV Game Awards GraphicPackage The Best Of year 2018--}}
    {{--                                        </a>--}}
    {{--                                    </h4>--}}
    {{--                                    <div class="info">--}}
    {{--                                        <span class="item-info">BY <a href="javascript:;">POLLY</a></span>--}}
    {{--                                        <span class="item-info">MAY 1, 2018</span>--}}
    {{--                                        <span class="item-info">TV show</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="description">--}}
    {{--                                        S1 E2 Escorpión/DzecThe one Mayans seek answers from a local crew as the--}}
    {{--                                        Galindo you worlds north and south of the border oldcollide.--}}
    {{--                                    </div>--}}
    {{--                                    <a href="#" class="btn-readmore btn-normal shape-round">--}}
    {{--                                        read more--}}
    {{--                                    </a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}


    {{--            <div class="bp-element bp-element-st-list-videos vblog-layout-1-1">--}}
    {{--                <div class="wrap-element">--}}
    {{--                    <div class="normal-items">--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-sm-6 col-lg-3">--}}
    {{--                                <div class="item">--}}
    {{--                                    <div class="pic">--}}
    {{--                                        <a href="#"><img src="{{asset('frontend/assets/images/png-bg-post-01.png')}}"--}}
    {{--                                                         alt="IMG"></a>--}}
    {{--                                        <div class="label">--}}
    {{--                                            HD--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <h4 class="title">--}}
    {{--                                        <a href="single-video.html">--}}
    {{--                                            Self-Hosted Video--}}
    {{--                                        </a>--}}
    {{--                                    </h4>--}}
    {{--                                    <div class="info">--}}
    {{--                                        FEBRUARY 10, 2018--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-sm-6 col-lg-3">--}}
    {{--                                <div class="item">--}}
    {{--                                    <div class="pic">--}}
    {{--                                        <a href="single-video.html"><img--}}
    {{--                                                src="{{asset('frontend/assets/images/png-bg-post-02.png')}}"--}}
    {{--                                                alt="IMG"></a>--}}
    {{--                                        <div class="label">--}}
    {{--                                            CAM--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <h4 class="title">--}}
    {{--                                        <a href="single- .html">--}}
    {{--                                            Self-Hosted Video--}}
    {{--                                        </a>--}}
    {{--                                    </h4>--}}
    {{--                                    <div class="info">--}}
    {{--                                        FEBRUARY 10, 2018--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-sm-6 col-lg-3">--}}
    {{--                                <div class="item">--}}
    {{--                                    <div class="pic">--}}
    {{--                                        <a href="single-video.html"><img--}}
    {{--                                                src="{{asset('frontend/assets/images/png-bg-post-03.png')}}"--}}
    {{--                                                alt="IMG"></a>--}}
    {{--                                        <div class="label">--}}
    {{--                                            Trailer--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <h4 class="title">--}}
    {{--                                        <a href="single-video.html">--}}
    {{--                                            Self-Hosted Video--}}
    {{--                                        </a>--}}
    {{--                                    </h4>--}}
    {{--                                    <div class="info">--}}
    {{--                                        FEBRUARY 10, 2018--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-sm-6 col-lg-3">--}}
    {{--                                <div class="item">--}}
    {{--                                    <div class="pic">--}}
    {{--                                        <a href="single-video.html"><img--}}
    {{--                                                src="{{asset('frontend/assets/images/png-bg-post-04.png')}}"--}}
    {{--                                                alt="IMG"></a>--}}
    {{--                                        <div class="label">--}}
    {{--                                            HD--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <h4 class="title">--}}
    {{--                                        <a href="single-video.html">--}}
    {{--                                            Self-Hosted Video--}}
    {{--                                        </a>--}}
    {{--                                    </h4>--}}
    {{--                                    <div class="info">--}}
    {{--                                        FEBRUARY 10, 2018--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}


    {{--    @include('frontend-layout.trending',['type'=>'Trending'])--}}

    {{--    @include('frontend-layout.trending',['type'=>'Latest Movies'])--}}

    {{--    @include('frontend-layout.trending',['type'=>'Latest TV Series'])--}}


    {{--    <div class="thim-ads_home-1">--}}
    {{--        <div class="container">--}}

    {{--            <div class="bp-element bp-element-call-to-action vblog-layout-1">--}}
    {{--                <div class="wrap-element" style="background-image: url('frontend/assets/images/ads-01.jpg');">--}}
    {{--                    <div class="overlay"></div>--}}
    {{--                    <a href="javascript:;" class="content">--}}
    {{--                        <div class="text">--}}
    {{--                            GAME SHOW Art line Collection Handmade--}}
    {{--                        </div>--}}
    {{--                        <div class="btn-readmore btn-small shape-round">--}}
    {{--                            read more--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}
    <script>
        document.querySelector("#slider > div.swiper-wrapper > div:nth-child(3) > div > div")
    </script>

    <script>
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide')
        const sliderBg = document.querySelector('.slider__bg');
        const sliderNext = document.querySelector('.slider-control.next');
        const sliderPrev = document.querySelector('.slider-control.prev');

        const flkty = new Flickity(slider, {
            cellAlign: 'left',
            cellSelector: '.slide',
            pageDots: false,
            wrapAround: true,
            draggable: false,
            prevNextButtons: false
        });

        function slideAnim(currentSlide, targetSlide) {
            let tl = gsap.timeline({defaults: {duration: .5, ease: 'power2.in'}});
            let currentSlideEl = slides[currentSlide];
            let year = currentSlideEl.querySelector('.slide__date');
            let title = currentSlideEl.querySelector('.slide__title');
            let img = currentSlideEl.querySelector('.slide__img');
            tl.to(year, {xPercent: -80, autoAlpha: 0});
            tl.to(img, {xPercent: -80, autoAlpha: 0}, '-=.3');
            tl.to(title, {xPercent: -80, autoAlpha: 0}, '-=.3');
            tl.add(() => {
                flkty.next();
            })
            tl.add(() => {
                tl.revert();
            }, '+=1')

        }

        flkty.on('change', (index) => {
            let currentSlide = slides[index];
            let bgColor = currentSlide.dataset.bg;
            sliderBg.style.backgroundColor = bgColor;
        })

        sliderNext.addEventListener('click', () => {
            let currentSlide = flkty.selectedIndex;
            slideAnim(currentSlide, 3)
        })

        function initSlider() {
            let currentSlide = slides[0];
            let bgColor = currentSlide.dataset.bg;
            sliderBg.style.backgroundColor = bgColor;
        }

        initSlider();

    </script>
    <style>

        -webkit-tap-highlight-color: transparent

        ;
        --blue: #007bff

        ;
        --indigo: #6610f2

        ;
        --purple: #6f42c1

        ;
        --pink: #e83e8c

        ;
        --red: #dc3545

        ;
        --orange: #fd7e14

        ;
        --yellow: #ffc107

        ;
        --green: #28a745

        ;
        --teal: #20c997

        ;
        --cyan: #17a2b8

        ;
        --white: #fff

        ;
        --gray: #6c757d

        ;
        --gray-dark: #343a40

        ;
        --primary: #007bff

        ;
        --secondary: #6c757d

        ;
        --success: #28a745

        ;
        --info: #17a2b8

        ;
        --warning: #ffc107

        ;
        --danger: #dc3545

        ;
        --light: #f8f9fa

        ;
        --dark: #343a40

        ;
        --breakpoint-xs:

        0
        ;
        --breakpoint-sm:

        576
        px

        ;
        --breakpoint-md:

        768
        px

        ;
        --breakpoint-lg:

        992
        px

        ;
        --breakpoint-xl:

        1200
        px

        ;
        --font-family-sans-serif: -apple-system, BlinkMacSystemFont,

        "Segoe UI"
        ,
        Roboto,

        "Helvetica Neue"
        ,
        Arial,

        "Noto Sans"
        ,
        "Liberation Sans"
        ,
        sans-serif,

        "Apple Color Emoji"
        ,
        "Segoe UI Emoji"
        ,
        "Segoe UI Symbol"
        ,
        "Noto Color Emoji"
        ;
        --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas,

        "Liberation Mono"
        ,
        "Courier New"
        ,
        monospace

        ;
        font-family: -apple-system, BlinkMacSystemFont,

        "Segoe UI"
        ,
        Roboto,

        "Helvetica Neue"
        ,
        Arial,

        "Noto Sans"
        ,
        "Liberation Sans"
        ,
        sans-serif,

        "Apple Color Emoji"
        ,
        "Segoe UI Emoji"
        ,
        "Segoe UI Symbol"
        ,
        "Noto Color Emoji"
        ;
        text-align: left

        ;
        font-size:

        14
        px

        ;
        line-height:

        1.5
        ;
        font-weight:

        400
        ;
        -webkit-text-size-adjust: none

        ;
        pointer-events: none

        ;
        box-sizing: border-box

        ;
        -webkit-transition: all

        .2
        s ease

        0
        s

        ;
        padding:

        .7
        rem

        ;
        height:

        73
        px

        ;
        background-color: #fff

        ;
        color: #111

        ;
        position: absolute

        ;
        bottom:

        -
        20
        px

        ;
        right:

        56
        px

        ;
        z-index:

        3
        ;
        opacity:

        0
        ;
        display: flex

        ;
        justify-content: flex-start

        ;
        align-items: center

        ;
    </style>

@endsection
