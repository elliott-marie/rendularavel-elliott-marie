

@extends('layouts.app')

@section('content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <h4 class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></h4>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <div class="container">
        <div class="boutonarticle text-center">
            <a class="btn" href="{{ route('article.create') }}">
                Créer un article
            </a>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td class="text-center" style="color:#c14c41">TITRE</td>
                <td class="text-center" style="color:#c14c41">DESCRIPTION</td>
                <td class="text-center" style="color:#c14c41">User</td>
                <td class="text-center" style="color:#c14c41">Action</td>

            </tr>
            </thead>
            @foreach($articles AS $article)
                <tr>
                    <td>
                        <h5>{{ $article->title }}</h5>
                    </td>
                    <td>
                        <p>{{ $article->content }} </p>
                        <p class="moreinfo" style="text-align:right; margin-bottom:1px;"><a href="{{ route('article.show', $article->id) }}">En savoir plus</a>
                        </p>
                    </td>
                    <td>
                        <h5>{{ $article->user->name }}</h5>
                    </td>
                    <td>
                            <a href="{{ url('/article') }}/{{$article->id}}/edit" class="btn">Modifier</a>
                            <br>
                            <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block; margin-top: 5px;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn">Supprimer</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="text-center">
            {{$articles->links()}}
        </div>
    </div>
@endsection