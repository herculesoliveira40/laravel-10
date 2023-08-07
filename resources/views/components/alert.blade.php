{{$slot}}  {{-- Exibir variavel na View que tem o component com tag <x-"nome_da_view" --}}

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <p> {{$error}} </p>
        </div>
    @endforeach
@endif
