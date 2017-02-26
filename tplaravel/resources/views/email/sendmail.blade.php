<style>
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
</style>

@extends('layouts.app')

@section('content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <h1>Envoi de Mail</h1>
    <div class="container text-center" >
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
        <form class="" action="{{ route('sendmail') }}" method="post">
            <input type="email" class="form-control" name="mail" placeholder="Mail adress">
            <br>
            <input type="text" class="form-control" name="title" placeholder="Votre message">
            <br>
            <input class="btn btn-lg push" type="submit" value="Valider">
            {{ csrf_field() }}
        </form>
    </div>
    </div>
    </div>

@endsection
