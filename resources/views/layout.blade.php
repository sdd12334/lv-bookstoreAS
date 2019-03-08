<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Protection-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My First Laravel Bookstore using Laravel 5.7</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/styles_1B.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/theme.default.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script> 
    <script src="{{ URL::asset('js/app.js') }}"></script> 
    <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.tablesorter.js') }}"></script>
  </head>
  <body>
    <header>
      <nav>
        <table id="nav-table"> 
          <tr> 
            <td class="value"><a href="/"><img class="logo" src="/images/logo.jpg" alt="Logo image"/></a></td> 
            <td class="value"><a href="/"><img title="Home" class="icon" src="/images/home.png" alt="Home image"></a></td> 
            <td class="value"><a href="/register"><img title="Register" class="icon" src="/images/register.png" alt="Register image" ></a></td> 
            <td class="value"><a href="/contact"><img title="Book Request" class="icon" src="/images/cart.png" alt="Cart image"></a></td> 
            <td class="value"><a href="/login"><img title="Lonin" class="icon" src="/images/login.png" alt="Login image"></a></td> 
            <td class="value"><a href="/home"><img title="Settings" class="icon" src="/images/admin.png" alt="Admin image"></a></td> 
            
          </tr> 
        </table>
      </nav>
    </header>

    <section id="articles">

      <article id="about">
        <h3>Laravel Bookstore</h3>
        <div class="container">
          @yield('about')
        </div>
      </article>

      <article id="article1">
        <div class="container">
          @yield('content')
        </div>
      </article>

    </section>
    
    <div class="line"></div>
    
    <div id="l-sidebar">
				<div id="nav-list">
          <div id="nav-icon"><img src="/images/bookstore-logo.jpg"/></div>
					<div id="item"><a class="top-bar" href="/">Home</a></div>
					<div id="item"><a class="top-bar" href="/contact">Order</a></div>
				
					<div id="item">
              <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                  
                  @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Longin') }}</a>
                    </li>
                  @endif
                  @else
                    <!-- Show Username of authenticated user  -->
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" >
                        {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <!-- Click to show  logout button-->
                      <div class="dropdown-menu dropdown-menu-right" >
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          <!-- CSRF Protection  equals to {{ csrf_field() }}-->
                          @csrf
                        </form>
                      </div>
                    </li>
                @endguest
              </ul>


          </div>
				</div>	
			</div>

    <footer>Copyright 2019 Online Book Store</footer>
  </body>
</html>

