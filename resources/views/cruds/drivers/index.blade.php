@extends('cruds.layouts.app')

@section('content')
    <body>
        <div class="container">
            <h1>Motoristas</h1>
                <table class="bordered striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($drivers as $driver)
                            <tr>
                                <td>{{ $driver->name }}</td>
                                <td>
                                    <a href="{{ route('drivers.edit', $driver->id) }}">Editar</a>
                                    <a href="{{ route('drivers.show', $driver->id) }}">Detalhes</a>
                                </td>
                            </tr>
                        @empty
                            <td>Nenhum Motorista</td>
                        @endforelse
                    </tbody>
                </table>
        </div>
        <div style="display: flex; justify-content: center; padding: 20px;">
            <a href="{{ route('drivers.create') }}"><button class="btn waves-effect waves-light" style="margin: auto;">
            Cadastrar</button></a>
        </div>
    </body>
@endsection