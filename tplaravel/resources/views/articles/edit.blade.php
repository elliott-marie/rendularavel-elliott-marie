<style>
    .push {
        margin-bottom: 100px;
    }
</style>

@extends('home')

@section('content')

    <div class="container text-center" >
        <div class="row">
            <div class="col-md-offset-3 col-md-6">

    <h1>Modification d'Article</h1>


        @include('messages.errors')
        <form method="POST" action="{{route('article.update', $article->id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="title" class="form-control" placeholder="Le titre de votre article" value="{{ $article->title }}">
            <br>
            <textarea name="content" class="form-control" placeholder="Écrivez votre article" rows="15"> "{{ $article->content }}" </textarea>
            <br>
            <input class="btn btn-lg push" type="submit" value="Valider">
        </form>
        <br>
            </div>
        </div>
    </div>
@endsection