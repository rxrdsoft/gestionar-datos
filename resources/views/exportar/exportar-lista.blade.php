<table>
    <thead>
    <tr>
        <th>nombre</th>
        <th>apellido</th>
        <th>email</th>
        <th>sms</th>
        <th>fecha_cumpleaños</th>
        <th>estado_civil</th>
        <th>genero</th>
        <th>profesion</th>
        <th>sector trabajo</th>
        <th>direccion</th>
        <th>distrito</th>
        <th>provincia</th>
        <th>departamento</th>

    </tr>
    </thead>
    <tbody>
    @foreach($listas as $lista)
        <tr>
            <td>{{ $lista->nombre }}</td>
            <td>{{ $lista->apellido }}</td>
            <td>{{ $lista->email }}</td>
            <td>{{ $lista->sms }}</td>
            <td>{{ $lista->fecha_cumpleanios }}</td>
            <td>{{ $lista->estado_civil }}</td>
            <td>{{ $lista->genero }}</td>
            <td>{{ $lista->profesion_ocupacion }}</td>
            <td>{{ $lista->sector_trabajo }}</td>
            <td>{{ $lista->sector_trabajo }}</td>
            <td>{{ $lista->direccion }}</td>
            <td>{{ $lista->distrito }}</td>
            <td>{{ $lista->provincia }}</td>
            <td>{{ $lista->departamento }}</td>
        </tr>
    @endforeach
    </tbody>
</table>