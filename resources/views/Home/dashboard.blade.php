@extends('home.layout.app')

@section('content')
@include('home.layout.nav')
  <!-- Masthead -->
  <header class="masthead text-white text-center" style="background-image: url({{ asset('assets/img/bg.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-1">BIZ</h1>
          <h4 class="mb-5">Solusi perjalanan anda</h4>
        </div>

        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="text" class="form-control form-control-lg" placeholder="Enter your destination...">
              </div>
              <div class="col-12 col-md-3 mb-5">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <br>
      @guest
      <div class="col-xl-9 mx-auto">
        <a class="btn btn-primary" href="{{ route('login') }}">Masuk</a>
        <a class="btn" style="color:white" href="{{ route('register') }}">Daftar</a>
      </div>
      @endguest
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="text-center">
      <h1>Service</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-hotel m-auto text-primary"></i>
            </div>
            <h3>Hotel Bookings</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-umbrella-beach m-auto text-primary"></i>
            </div>
            <h3>Best Trip</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-user-shield m-auto text-primary"></i>
            </div>
            <h3>Insurance For Tourists</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <!-- <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url({{ asset('assets/img/bg-showcase-1.jpg')}});"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Fully Responsive Design</h2>
          <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url({{ asset('assets/img/bg-showcase-2.jpg')}});"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Updated For Bootstrap 4</h2>
          <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url({{ asset('assets/img/bg-showcase-3.jpg')}});"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Easy to Use &amp; Customize</h2>
          <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
        </div>
      </div>
    </div>
  </section> -->

  <section class="container-fluid bg-3 text-center">
    <div class="container-fluid bg-3 text-center">
      <h2>Find Your Destination</h2>
      <br><br>
      <div class="row">
        <div class="col-sm-4 thumbnail">
          <img src="{{ asset('assets/img/bromo.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
          <h4 class="title">Gunung Bromo</h4>
          <div class="btn-group btn-group-justified" style="margin-top:10px;">
            <button type="button" class="btn btn-primary">Booking</button>
            <button type="button" class="btn btn-default">Detail</button>
          </div>
        </div>
        <div class="col-sm-4 thumbnail">
          <img src="{{ asset('assets/img/bromo.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
          <h4 class="title">Gunung Bromo</h4>
          <div class="btn-group btn-group-justified" style="margin-top:10px;">
            <button type="button" class="btn btn-primary">Booking</button>
            <button type="button" class="btn btn-default">Detail</button>
          </div>
        </div>
        <div class="col-sm-4 thumbnail">
          <img src="{{ asset('assets/img/bromo.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
          <h4 class="title">Gunung Bromo</h4>
          <div class="btn-group btn-group-justified" style="margin-top:10px;">
            <button type="button" class="btn btn-primary">Booking</button>
            <button type="button" class="btn btn-default">Detail</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <!-- <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">What people are saying...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets/img/testimonials-1.jpg') }}" alt="">
            <h5>Margaret E.</h5>
            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets/img/testimonials-2.jpg') }}" alt="">
            <h5>Fred S.</h5>
            <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets/img/testimonials-3.jpg') }}" alt="">
            <h5>Sarah W.</h5>
            <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Call to Action -->
  <!-- <section class="call-to-action text-white text-center" style="background-image: url({{ asset('assets/img/bg.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> -->
  @endsection