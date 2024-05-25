@extends('cruds.layouts.app')

@section('content')
<body>
      <h1 style="padding: 10px;">Atualizar Veículo {{$vehicle->model}}</h1>
      @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <div class="row">
      <form class="col s12" action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf()
        @method('put')
        <div class="row">
          <div class="input-field inline col s3">
            <p>Modelo</p>
            <input name="model" type="text" placeholder="Modelo" class="validate" value="{{ $vehicle->model }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s2">
          <p>Ano</p>
            <input name="year" type="number" placeholder="Ano" class="validate" value="{{ $vehicle->year }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
          <p>Km de Aquisição</p>
            <input name="km_acquisition" type="number" placeholder="Km de Aquisição" class="validate" value="{{ $vehicle->km_acquisition }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <p>Data de Aquisição: {{ $vehicle->date_acquisition->format('d/m/Y') }}</p>
            <input name="date_acquisition" type="date" placeholder="Data de Aquisição" class="datepicker">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <p>RENAVAM</p>
            <input name="renavam" type="text" placeholder="RENAVAM" class="validate" value="{{ $vehicle->renavam }}">
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Atualizar
        <i class="material-icons right">send</i>
    </button>
    <a href="{{ route('vehicles.index') }}" style="color: white;"><button class="btn waves-effect waves-light" 
    name="action">Home
        <i class="material-icons right">home</i></a>
      </form>
      
    </div>
          
  </body>
@endsection