@extends('cruds.layouts.app')

@section('content')
    <body>
        <div class="container">
            <h1>Motoristas</h1>
                <table class="bordered striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>CNH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->date_of_birth->format('d/m/Y') }}</td>
                            <td>{{ $driver->cnh }}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <div style="display: flex; justify-content: center; padding: 20px;">
            <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                @csrf()
                @method('delete')
                <button class="btn waves-effect waves-light" type="submit" 
                style="margin: auto; background-color: red;">
                Deletar</button>
        </div>
    </body>
@endsection