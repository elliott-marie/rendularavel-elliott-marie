@extends('layouts.app')

<style>
    .push {
        margin-bottom: 5px;
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
    h3{
        color:#efefef !important;
    }
</style>

@section('content')
<div class="container overlay">
    <div class="row">
        <div class="col-md-12">
            @if (Auth::check())
                <h1>Bonjour {{Auth::user()->name}}</h1>
            @else()
                <h1>Bonjour invité</h1>
            @endif
        </div>
        <div class="col-md-12 push text-center">
            @if ( Auth::user()->isAdmin == 1)
                <h3>Vous êtes administrateur</h3>
            @else()
            <h3>Vous êtes bien connecté</h3>
            @endif
                @if (Auth::check())
                <h1><a href="{{ url('/user') }}">Voir votre profil</a></h1>
                    @if ( Auth::user()->isAdmin == 1)
                    <h1><a href="{{ url('/admin') }}">Liste des articles</a></h1>
                    @else
                        <h1><a href="{{ url('/article') }}">Liste des articles</a></h1>
                    @endif
                <h1><a href="{{ url('/article/create') }}">Rédiger un article</a></h1>
                    @endif
        </div>
    </div>
</div>
@endsection
