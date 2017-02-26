<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

    <style>
        body{
            background-color:black !important;
        }
        .overlay{

            background:url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/footer_lodyas.png);
            -webkit-animation:100s scroll infinite linear;
            -moz-animation:100s scroll infinite linear;
            -o-animation:100s scroll infinite linear;
            -ms-animation:100s scroll infinite linear;
            animation:100s scroll infinite linear;
            top:0;
            left:0;
            width:100%;
            height:100%;
        }


        h1{
            text-align:center;
            color:#FFF !important;
            margin-top:5%;
            font:60px Lobster;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
            0px 8px 13px rgba(0,0,0,0.1),
            0px 18px 23px rgba(0,0,0,0.1);
        }

        h2{
            color:#FFF !important;
            margin-top:10%;
            font-size:40px;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
            0px 8px 13px rgba(0,0,0,0.1),
            0px 18px 23px rgba(0,0,0,0.1);
        }

        h5{
            color:#CCCCCC !important;
            text-align:center;
        }

        p{
            color:#CCCCCC !important;
            margin-top:8px;
        }

        .moreinfo{
            color:#FFF;
            text-align:center;
            font:15px Lobster;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
            0px 8px 13px rgba(0,0,0,0.1),
            0px 18px 23px rgba(0,0,0,0.1);
        }


        @-webkit-keyframes scroll{
            100%{
                background-position:0px -3000px;
            }
        }

        @-moz-keyframes scroll{
            100%{
                background-position:0px -3000px;
            }
        }

        @-o-keyframes scroll{
            100%{
                background-position:0px -3000px;
            }
        }

        @-ms-keyframes scroll{
        100%{
            background-position:0px -3000px;
        }
        }

        @keyframes scroll{
            100%{
                background-position:0px -3000px;
            }
        }


        .btn{
            background:#e74c3c;
            color:#FFF;
            position:relative;
            padding:7px;
            font-weight:900 !important;
            text-transform:uppercase;
            border-radius:5px;
            font:14px lato;
            opacity:0.8;
            letter-spacing:1px;
            text-decoration:none;
        }

        a:hover{
            opacitY:1;
        }

    </style>

</head>
<body>
<div class="overlay">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Connexion</a></li>
                        <li><a href="{{ route('register') }}">Inscription</a></li>
                    @else
                        <li><a href="{{ url('/article/create') }}">Rédiger Article</a></li>
                        @if ( Auth::user()->isAdmin == 0)
                        <li><a href="{{ url('/article') }}">Liste Articles</a></li>
                           @else
                            <li>
                                <a href="{{ url('/admin') }}">
                                    Administration
                                </a>
                            </li>
                        @endif
                        <li><a href="{{ url('/user') }}">Profil</a></li>
                        <li><a href="{{ url('/sendmail') }}">Email</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>



                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @if ( Auth::user()->isAdmin == 1)
                                    <li>
                                        <a href="{{ url('/admin') }}">
                                            Administration
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
</div>
<!-- Scripts -->
<script type="text/javascript" src="/js/app.js">

</script>

</body>
</html>
