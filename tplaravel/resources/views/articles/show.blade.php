@extends('layouts.app')

<style>
    .push {
        margin-bottom: 5px;
        margin-top: 20px;
    }
    .supp {
        font-size:10px !important;
    }
</style>

@section('content')
    <div class="container">
        <article class="" data-postid="{{$article->id}}">
            <h2> {{ $article->title }},</h2>
            <p> {{ $article->content }},</p>
            <h3>Écrit par : <a href="{{ url('/user/'.$article->user->id) }}">{{ $article->user->name }}</a></h3>

            <div class="interaction">
                <a href="#" class="share">Partager</a>
                @if ( $article->user_id == $user->id)
                    |   <a href="{{ url('/article') }}/{{$article->id}}/edit">Modifier cette article</a> |
                    <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block; margin-top: 5px;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn supp">Supprimer cette Article</button>
                    </form>
                @endif
            </div>

        </article>
        <br>

        @if (!empty($article->comments))
            <h2>Liste des commentaires</h2>
            @foreach($article->comments AS $comment)
                <div style="border-left:3px solid orange; padding-left:10px;">
                    <p>
                        {{ $comment->comment }}
                    </p>
                    @if($comment->user)
                        <div class="info">
                            Posted by {{ $comment->user->name  }} on {{$article->created_at}}
                        </div>
                    @endif
                </div>
                <hr>

            @endforeach
        @else
            Aucun commentaire
        @endif

        <form action="{{ route('article.comment', $article->id) }}" method="post">
            {{ csrf_field() }}
            <textarea name="comment" class="form-control" placeholder="Votre commentaire"></textarea>
            <button class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <script>
        var token ='{{ Session::token() }}'
        var urlLike ="{{ route('article.like') }}"
    </script>
@endsection