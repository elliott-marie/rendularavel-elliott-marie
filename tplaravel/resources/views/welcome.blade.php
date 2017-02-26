@extends('layouts.app')

        <style>
            .push{
                margin-bottom:5px;
            }
            .logmenu {
                font-size:20px;
                text-align:center;
            }
        </style>

        @section('content')

        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    </head>
    <body>
        <div class="push">
            @if (Route::has('login'))
                <div class="logmenu">
                    <h1>Bienvenue sur le Blog Littéraire de L'IIM</h1>
                    <br>
                @if (Auth::check())
                        <h1><a href="{{ url('/user') }}">Voir votre profil</a></h1>
                        @if ( Auth::user()->isAdmin == 1)
                            <h1><a href="{{ url('/admin') }}">Lire des articles</a></h1>
                        @endif
                            <h1><a href="{{ url('/article') }}">Lire des articles</a></h1>
                    @else
                        <h1><a href="{{ url('/login') }}">Se connecter</a></h1>
                        <h1><a href="{{ url('/register') }}">S'inscrire</a></h1>
                    @endif
                </div>
            @endif
        </div>
    </body>
</html>
@endsection