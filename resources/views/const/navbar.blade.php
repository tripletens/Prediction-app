<!--================ Header Menu Area start =================-->
<header class="header_area">
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container box_1620">
        <a class="navbar-brand logo_h" href="{{ route('welcome') }}"><img src="{{ asset('img/logo.png') }}" alt="logo here"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav justify-content-end">
            <li class="nav-item active"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('strategy') }}">Our Strategy</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contact-us') }}">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          </ul>

          <ul class="nav-right text-center text-lg-right py-4 py-lg-0">
            <li><a href="{{ route('register') }}">Join Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>