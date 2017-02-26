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

                <h1>Création d'article</h1>
                    <br>
               @include('messages.errors')
               <form method="POST" action="{{route('article.store')}}">
                    {{csrf_field()}}
                    <input type="text" name="title" class="form-control" placeholder="Le titre de votre article">
                    <br>
                    <textarea name="content" class="form-control" placeholder="Écrivez votre article" rows="15">
                    </textarea>
                    <br>
                    <input class="btn btn-lg push" type="submit" value="Valider">
                </form>
           </div>
       </div>
   </div>
@endsection






