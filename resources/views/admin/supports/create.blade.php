Create

@if($errors->any())
    @foreach($errors->all() as $error)
     
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

<form action="{{route('supports.store')}}" method="post" >

    @include('/admin/supports/_partials/form')


</form>