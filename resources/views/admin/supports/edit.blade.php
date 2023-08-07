Duvida {{$support->id}}

<x-alert> Edit Alert </x-alert>

<form action="{{route('supports.update', $support->id)}}" method="post" >
    @method('put')
    @include('/admin/supports/_partials/form')
    
</form>