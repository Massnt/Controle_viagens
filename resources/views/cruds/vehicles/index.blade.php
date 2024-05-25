<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Veiculos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h1>Veiculos</h1>
            <table class="bordered striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>RENAVAM</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->model }}</td>
                            <td>{{ $vehicle->year }}</td>
                            <td>{{ $vehicle->renavam }}</td>
                            <td>
                                <a href="{{ route('vehicles.edit', $vehicle->id) }}">Editar</a>
                                <a href="{{ route('vehicles.show', $vehicle->id) }}">Detalhes</a>
                            </td>
                        </tr>
                    @empty
                        <td>Nenhum Veiculo</td>
                    @endforelse
                </tbody>
            </table>
    </div>
    <div style="display: flex; justify-content: center; padding: 20px;">
            <a href="{{ route('vehicles.create') }}"><button class="btn waves-effect waves-light" style="margin: auto;">
            Cadastrar</button></a>
        </div>
</body>
</html>
    
