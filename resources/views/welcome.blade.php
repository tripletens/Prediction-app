@extends('layouts.myapp')

@section('mycontent')
  <section class="hero-banner">
    <div class="container text-center">
      <!--  -->
      <h1 style="color:#fff;">ODD PREDICT</h1>
      <a class="button button-header btn-default" href="{{ route('register') }}">Join Us</a>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


  <!--================ Innovation section Start =================-->
  <section class="section-padding--small bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
          <div class="innovative-wrapper">
            <h3 class="primary-text">Let's talk <br class="d-none d-xl-block"> Sport betting.</h3>
            <!-- <p class="h4 primary-text2 mb-3">Where The business World Meets</p> -->
            <p>
              Everyday, Sport fans around the world are actively seeking for websites and platforms
              that offer accurate predictions and profits over the long term.
              Our platform provide you access to large odds prediction with accuracy from 65% + </p>
          </div>
        </div>
        <div class="col-lg-6 pl-xl-5">
          <img src="https://www.bookmakers.bet/wp-content/uploads/2017/02/odds.jpg" class='img-thumbnail'>
        </div>
      </div>
    </div>
  </section>
  <!--================ Innovation section End =================-->


  <!--================ Join section Start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-98px">
        <p class="section-intro__title">Join Us</p>
        <h2 class="primary-text">Why Join Us</h2>
        <!-- <img src="{{ asset('img/home/section-style.png')}}" alt=""> -->
      </div>

      <style type="text/css" rel="stylesheet">
        .feature-prize .feature-icon :hover {
          color: #1717FF;
          /* background: #1717FF; */
        }
      </style>
      <div class="d-lg-flex justify-content-between">
        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="flaticon-prize"></i>
          </div>
          <h3>High Accuracy </h3>
          <p>We give you odds with great accuracy from our seasoned sports experts. </p>
        </div>

        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="flaticon-earth-globe"></i>
          </div>
          <h3>Great Odds </h3>
          <p>You have access to a large odd value still having great accuracy ranges </p>
        </div>

        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="flaticon-sing"></i>
          </div>
          <h3>Quality Customer Care </h3>
          <p>We appreciate your trust, hence we have provided a great customer care service to attend to your needs appropriately.</p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a class="button mr-3 mb-2" href="{{ route('register') }}">Join Us</a>
          <a class="button mb-2" href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </section>
@endsection