@extends('layouts.myapp')

@section('mycontent')
    <!--================Hero Banner Area Start =================-->
  <section class="hero-banner hero-banner-sm">
    <div class="container text-center">
      <h2>Our Strategy </h2>
      <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Our Strategy</li>
        </ol>
      </nav>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->



  <!-- ================ Join section Start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-98px">
        <!-- <p class="section-intro__title">Our Strategy</p> -->
        <!-- <h2 class="primary-text">Our methods </h2> -->
        <img src="http://mkleader.com/images/strat.jpg" alt="">
      </div>


      <div class="d-lg-flex justify-content-between text-center">
        <h2 class="row">We propose to associate several games to build an acca or a multiple.
          Nevertheless we have a breakdown to which we group our games<br>
          <div class="col-md-6">
            <i class="fas fa-dice fa-10x"></i><br>
            <h3 style="color:green">Low Odd Games</b> ( i.e These games have low odds but with accuracy of 70% - 95%)</h3><br>
          </div>
          <div class="col-md-6">
            <i class="far fa-lightbulb fa-10x"></i><br>
            <h3 style="color:#1717FF ">High Odd Games</b> ( i.e These games have high odds but with accuracy of 60% - 75%)</h3><br>
          </div>
        </h2>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a class="button mr-3 mb-2" href="{{ route('register') }}">JOIN US</a>
          <a class="button mb-2" href="{{ route('login') }}">LOGIN</a>
        </div>
      </div>
    </div>
  </section>
        
@endsection