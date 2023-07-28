Duvida {{$support->id}}

<form action="{{route('supports.update', $support->id)}}" method="post" >
    @method('put')
    @include('/admin/supports/_partials/form')
    
</form>