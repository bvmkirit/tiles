@extends('frontend-layout.auth.main')

@section('content')

    {{--    <div class="login-signin">--}}
    {{--        <div class="mb-20">--}}
    {{--            <h3>Sign Up</h3>--}}
    {{--            <p class="opacity-60 font-weight-bold">Enter your detailchb s to login to your account:</p>--}}
    {{--        </div>--}}
    {{--        <form class=" login_form" role="form" method="POST" action="{{ route('register') }}">--}}
    {{--            {{ csrf_field() }}--}}
    {{--            <div class="form-group">--}}
    {{--                <input--}}
    {{--                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"--}}
    {{--                    type="text" name="name" placeholder="Name" id="name" autocomplete="off"/>--}}
    {{--                @if ($errors->has('name'))--}}
    {{--                    <span class="help-block">--}}
    {{--                        <strong>{{ $errors->first('name') }}</strong>--}}
    {{--                     </span>--}}
    {{--                @endif--}}

    {{--                <div class="form-group">--}}
    {{--                    <input--}}
    {{--                        class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"--}}
    {{--                        type="text" placeholder="Email" name="email" id="email" autocomplete="off"/>--}}
    {{--                    @if ($errors->has('email'))--}}
    {{--                        <span class="help-block">--}}
    {{--                         <strong>{{ $errors->first('email') }}</strong>--}}
    {{--                        </span>--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"--}}
    {{--                           type="password" placeholder="Password" name="password"/>--}}
    {{--                    @if ($errors->has('password'))--}}
    {{--                        <span class="help-block">--}}
    {{--                        <strong>{{ $errors->first('password') }}</strong>--}}
    {{--                        </span>--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <input--}}
    {{--                        class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"--}}
    {{--                        type="password" placeholder="Confirm Password" name="password_confirmation"/>--}}
    {{--                    @if ($errors->has('password_confirmation'))--}}
    {{--                        <span class="help-block">--}}
    {{--                        <strong>{{ $errors->first('password_confirmation') }}</strong>--}}
    {{--                        </span>--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">--}}
    {{--                    <label class="checkbox checkbox-outline checkbox-white text-white m-0">--}}
    {{--                        <input type="checkbox" name="remember"/>Remember me--}}
    {{--                        <span></span></label>--}}
    {{--                    <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password--}}
    {{--                        ?</a>--}}
    {{--                </div>--}}
    {{--                <div class="form-group text-center mt-10">--}}
    {{--                    <button  type="submit"--}}
    {{--                             class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign up--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}
    {{--        <div class="mt-10">--}}
    {{--            <span class="opacity-70 mr-4">Don't have an account yet?</span>--}}
    {{--            <a href="javascript:;" id="kt_login_signup" class="text-white font-weight-bold">Sign Up</a>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Sign Up</h2>
                        <p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
                    </div>
                </div>
            </div>
            <form class=" login_form" role="form" method="POST" action="{{ route('front-register') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <input type="text" placeholder="Name" name="name" id="name" autocomplete="off"/>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <input type="text" placeholder="Email" name="email" id="email" autocomplete="off"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                             <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <input type="text" placeholder="Mobile Number" name="phone" id="phone" autocomplete="off"/>
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="offset-3 col-md-6">
                        <input placeholder="Password" type="password" name="password"/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="row">
                    <div class="offset-3 col-md-6">
                        <input
                            type="password" placeholder="Confirm Password" name="password_confirmation"/>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
