<table>
    <thead>
    <tr>
        <th>email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invalidos as $invalido)
        <tr>
            <td>{{ $invalido->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>