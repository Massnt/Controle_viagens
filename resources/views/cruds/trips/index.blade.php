@extends('cruds.layouts.app')

@section('content')
    <body>
        <div class="container">
            <h1>Viagens</h1>
                <table class="bordered striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Data de Inicio</th>
                            <th>Data de Fim</th>
                            <th>Modelo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trips as $trip)
                            <tr>
                                <td>{{ $trip->start_date->format('d/m/Y') }}</td>
                                <td>{{ $trip->end_date->format('d/m/Y') }}</td>
                                <td>{{ $trip->vehicle->model }}</td>
                                <td>
                                    <a href="{{ route('trips.edit', $trip->id) }}">Editar</a>
                                    <a href="{{ route('trips.show', $trip->id) }}">Detalhes</a>
                                </td>
                            </tr>
                        @empty
                            <td>Nenhuma Viagem</td>
                        @endforelse
                    </tbody>
                </table>
        </div>
        <div style="display: flex; justify-content: center; padding: 20px;">
            <a href="{{ route('trips.create') }}"><button class="btn waves-effect waves-light" style="margin: auto;">
            Cadastrar</button></a>
        </div>
    </body>
@endsection