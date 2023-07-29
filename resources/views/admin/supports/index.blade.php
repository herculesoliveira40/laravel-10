<h1> Lista de suportes</h1>

<a href="{{route('supports.create') }}">Criar Suport</a>

<table> 
    <thead> 
        <th> assuntos</th>
        <th> status</th>
        <th> descrição</th>

    </thead>
    <tbody>
        @foreach($supports as $support)
            <tr>
                <td>{{$support->subject}}</td>
                <td>{{$support->status}}</td>
                <td>{{$support->body}}</td>
                <td>
                    <a href="{{route('supports.show', [$support->id])}}">  =  </a>
                    <a href="{{route('supports.edit', [$support->id])}}">  /  </a>
                    <form method="post" action="{{route('supports.delete', [$support->id])}}">
                        @csrf 
                        @method('delete')                   
                        <input type="submit" value=" X ">    
                    </form>  
                </td>
            </tr>
        @endforeach
    </tbody>



</table>