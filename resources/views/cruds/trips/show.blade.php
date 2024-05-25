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
                            <th>Km Inicial</th>
                            <th>Km Final</th>
                            <th>Modelo</th>
                            <th>Motoristas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $trip->start_date->format('d/m/Y') }}</td>
                            <td>{{ $trip->end_date->format('d/m/Y') }}</td>
                            <td>{{ $trip->start_km }}</td>
                            <td>{{ $trip->end_km }}</td>
                            <td>{{ $trip->vehicle->model }}</td>
                            <td>
                                @forelse($trip->drivers as $driver)
                                    {{ $driver->name }}, 
                                @empty
                                @endforelse
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <div style="display: flex; justify-content: center; padding: 20px;">
            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST">
                @csrf()
                @method('delete')
                <button class="btn waves-effect waves-light" type="submit" 
                style="margin: auto; background-color: red;">
                Deletar</button>
        </div>
    </body>
@endsection