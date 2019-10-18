<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home')}}">Biz</a>
        <div class="navbar navbar-right">
            <a class="btn" href="{{ route('home')}}">Home</a>
            <a class="btn" href="#">Rent Car</a>
            <a class="btn" href="#">Trip</a>
        </div>
        @auth()
        <div class="dropdown" style="margin-top: 7px;">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class=" fas fa-user-circle"></i> 
                {{ str_limit(Auth::user()->name, 12) }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="">Profil
            </a>
            <a class="dropdown-item" href="">Trip Saya
            </a>
            <a href="{{ route('logout') }}" class="dropdown-item"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </div>
        </div>
        @endauth

    </div>
  </nav>