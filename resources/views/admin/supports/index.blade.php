<h1>Suportes</h1>
<a href="{{ route('supports.create')}}">Criar Duvida</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
    </thead>
    <tbody>
        @foreach($supports->items() as $support)
            <tr>
                <td>{{ $support->body   }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->subject}}</td>
                <td>
                    <a href="{{ route('supports.show',$support->id) }}">Ir</a>
                    <a href="{{ route('supports.edit',$support->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-pagination :paginator="$supports" :appends="$filters"/>
