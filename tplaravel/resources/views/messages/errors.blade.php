<style>
    .push {
        margin-bottom: 5px;
    }
</style>

@if (count($errors) > 0)
    <h2>Attention !</h2>

        @foreach($errors->all() as $error)
            <div class="erreur push">
            <h5>{{ $error }}</h5>
            </div>
        @endforeach

@endif
