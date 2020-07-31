@extends('layouts.myapp')
@section('mycontent')
    <!--================Hero Banner Area Start =================-->
  <section class="hero-banner hero-banner-sm">
    <div class="container text-center">
      <h2>About Us</h2>
      <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ asset('welcome') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
      </nav>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->



  <!-- ================ Join section Start ================= -->
  <section class="section-padding--small bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
          <div class="innovative-wrapper">
            <h3 class="primary-text">Let's talk <br class="d-none d-xl-block"> About Us.</h3>
            <!-- <p class="h4 primary-text2 mb-3">Where The business World Meets</p> -->
            <p>
              At Oddpredict.com, we set a benchmark of making provision of safe and accurate football tips you can trust! 
              OddPredict predictions, tips & analysis are based on algorithms, detailed analysis, betting tips, forms and statistics. 
              Events like transfers, suspensions and injuries are also put into consideration 
              We have dedicated experts that are passionate in Combining match previews and statistical analysis with top value betting tips.
              We pride ourselves as the most accurate Sports prediction website in the world, 
              as we have recorded over 95% accuracy over time

              We are dedicated to ensuring maximum gains and returns for you by providing valued bets on soccer predictions.
              We provide you with the most accurate
              and guaranteed football tips everyday of the week. 
              We are relentless in our drive to assist many bettors make good use of the tips we provide to guarantee
              Oddpredict is the solution to excessive losses for sports punters and the confidence into sports investment</p>
          </div>
        </div>
        <div class="col-lg-6 pl-xl-5">
          <img src="https://www.bookmakers.bet/wp-content/uploads/2017/02/odds.jpg" class='img-thumbnail'>
        </div>
      </div>
    </div>
  </section>
  <!--================ Join section End =================-->
@endsection
        