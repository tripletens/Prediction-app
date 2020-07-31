@extends('layouts.myapp')

@section('mycontent')
        <!--================Hero Banner Area Start =================-->
    <section class="hero-banner hero-banner-sm">
        <div class="container text-center">
            <h2>Sign In </h2>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('login') }}">Login</a></li>
                </ol>
            </nav>
        </div>
    </section>
    <!--================Hero Banner Area End =================-->
    <!--================ Innovation section Start =================-->
    <section class=" section-padding--small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                    <div class="innovative-wrapper">
                        <h3 class="primary-text">Join Us <br class="d-none d-xl-block"> For Bet Predictions </h3>
                        <p class="h4 primary-text2 mb-3">Great Odd Predictions </p>
                        <p>FindOut the Power of our Odd Predictions </p>
                    </div>
                </div>
                <div class="col-lg-6 pl-xl-5">
                
                <form class="text-center border border-light p-5" method="POST" action="{{ route('process-login') }}">
                    <p class="h4 mb-4">ADMIN SIGN IN</p>
                    
                    {{ csrf_field() }}
                    @include('inc.messages')
                    <div class="row form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail Address : </label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> 
                        </div>
                    </div>

                    <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password :</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="password" required> 
                          
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <button type="submit" class="btn btn-block btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </section>
@endsection
