@extends('frontend-layout.auth.main')

@section('content')
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Sign In</h2>
                    <p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
                </div>
            </div>
        </div>
        <form class=" login_form" role="form" method="POST" action="{{ route('front-login') }}">
            {{ csrf_field() }}
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
                    <input placeholder="Password"  type="password"  name="password"/>
                    @if ($errors->has('password'))--}}
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                </div>
                <div class="col-lg-12 text-center">

                    <button type="submit" class="site-btn">Login</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

