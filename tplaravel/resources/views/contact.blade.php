<style>
    .push {
        margin-bottom: 5px;
    }
</style>

@extends('home')

@section('content')
    <div class="container text-center" >
        <div class="row">
            <div class="col-md-offset-3 col-md-6">

                <h1>Envoi d'un message</h1>
                <br>
                @include('messages.errors')
                <form action="{{ route('contact') }}" method="post">
                    <input type="email" class="form-control" name="email" placeholder="Votre mail">
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






