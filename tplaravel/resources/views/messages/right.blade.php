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
                <h1>Vous n'avez pas les droits nécessaires pour consulter cette page</h1>
            </div>
        </div>
    </div>
@endsection
