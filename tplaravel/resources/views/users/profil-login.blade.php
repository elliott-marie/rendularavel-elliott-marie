<style>
    .except{
        margin-top:5px;
        margin-bottom: 40px;
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
    .btn{
        font-size:10px !important;
        margin-top:7px;
    }
    .btn.creation{
        font-size:13px !important;
    }
    h4 {
        margin-top:20px !important;
        color:white !important;
    }
    h1.modif {
        font-size:30px !important;
        text-align:left !important;
    }
</style>

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="modif"> Bienvenue {{Auth::user()->name}} !</h1>
                <h2>Informations de profil :</h2>
                <h4>Votre mail est : {{Auth::user()->email}}</h4>
                <h4> Votre compte a été créé le {{Auth::user()->created_at}}</h4>
                <h1 class="modif"><a href="{{ url('/editProfil') }}">Modifier votre profil</a></h1>
            </div>
            <div class="col-md-6">
                <img class="img-rounded" alt="image de profil" style="max-width:150px; float:right; border:3px solid #d34032" src="{{ route('account.image', ['filename' => $name . '-' . $id . '.jpg']) }}">
            </div>
        </div>
    </div>

<hr>
    <div class="container overlay">
         <div class="row">
            <h1 class="except">Liste de vos articles</h1>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>TITLE</td>
                    <td>DESCRIPTION</td>
                    <td>User</td>
                    <td>ACTIONS</td>
                </tr>
                </thead>
                @foreach($articles AS $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            {{ $article->title }}
                        </td>
                        <td>
                            {{ $article->content }}
                        </td>
                        <td>
                            {{ $article->user->name }}
                        </td>
                        <td>
                            <a href="{{ route('article.show', $article->id) }}" class="btn">Afficher</a>
                            <a href="{{ url('/article') }}/{{$article->id}}/edit" class="btn">Modifier</a>
                            <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn">Supprimer</button>
                            </form>
                        </td>
                        <a href="{{ url('/article') }}/{{$article->id}}/edit">
                        </a>
                    </tr>
                @endforeach
            </table>
             <div class="text-center">
             <a class="btn creation" href="{{ route('article.create') }}">
                 Créer un nouvel article
             </a>
             </div>
        </div>
    </div>
@endsection