<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="{{route('welcome')}}"><img src="/img/logo.png" alt="logo"></a>

        </div>

        <nav>
            <ul class="nav-links">
                <li class="nav-link"><a href="{{route('about')}}">About</a></li>
                <li class="nav-link"><a href="{{route('login')}}">Log In</a></li>
                <li class="nav-link"><a href="{{route('register')}}">Sign Up</a></li>
                <li class="nav-link"><a href="{{route('contact')}}">Contact Us</a></li>

            
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li> 
            </ul>
        </nav>
    </header>
    @yield('content')

    <!-- <footer>
        <div class="footer-container">
            <p>Sito creato da Bryan per info chiedere all'email: ichigoplayer18@gmail.com</p>
        </div>
        <footer> -->
</body>

</html>