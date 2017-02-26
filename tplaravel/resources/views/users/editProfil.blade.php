
@extends('layouts.app')

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h1>Modifier votre profil</h1><br>
                <img class="img-responsive" style="max-width:220px; margin-left:200px; border:3px solid #d34032" src="{{ route('account.image', ['filename' => $user->name . '-' . $user->id . '.jpg']) }}">
            </header>
            <form class="" action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="button" class="btn push">Sauvegarder Votre Profil</button><br><br>
                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                </div>
            </form>
        </div>
    </section>

@endsection
