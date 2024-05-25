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
                        <th>Km de Aquisição</th>
                        <th>Data de Aquisição</th>
                        <th>RENAVAM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>{{ $vehicle->km_acquisition }}</td>
                        <td>{{ $vehicle->date_acquisition->format('d/m/Y') }}</td>
                        <td>{{ $vehicle->renavam }}</td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div style="display: flex; justify-content: center; padding: 20px;">
            <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="POST">
                @csrf()
                @method('delete')
                <button class="btn waves-effect waves-light" type="submit" 
                style="margin: auto; background-color: red;">
                Deletar</button>
    </div>
</body>
</html>
    
