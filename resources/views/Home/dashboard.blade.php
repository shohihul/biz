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

  <section class="container-fluid bg-3 text-center">
    <div class="container-fluid bg-3 text-center">
      <h2>Find Your Destination</h2>
      <br><br>
      <div class="row">
        @foreach ($destination as $row)
        <div class="col-sm-4 thumbnail">
          <img src="{{ asset('assets/img/destination/' . $row->thumbnail)}}" class="img-responsive" style="width:100%; height: 350px; object-fit: cover;" alt="Image">
          <h4 class="title">{{$row->name}}</h4>
          <div class="btn-group btn-group-justified" style="margin-top:10px;">
            <button type="button" class="btn btn-primary">Booking</button>
            <button type="button" class="btn btn-default">Detail</button>
          </div>
        </div>
        @endforeach
    </div>
  </section>
  @endsection