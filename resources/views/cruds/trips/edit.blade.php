@extends('cruds.layouts.app')

@section('content')
<body>
      <h1 style="padding: 10px;">Atualizar Viagem {{  $trip->id }}</h1>
      @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <div class="row">
      <form class="col s12" action="{{ route('trips.update', $trip->id) }}" method="POST">
        @csrf()
        @method('put')
        <div class="row">
          <div class="input-field inline col s3">
            <p>Data Inicial: {{ $trip->start_date->format('d/m/Y') }}</p>
            <input name="start_date" type="date" class="datepicker">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <p>Data Final: {{ $trip->end_date->format('d/m/Y') }}</p>
            <input name="end_date" type="date" class="datepicker">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s2">
            <p>Km  Inicial</p>
            <input name="start_km" type="number" class="validate" value="{{ $trip->start_km }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s2">
            <p>Km  Final</p>
            <input name="end_km" type="number" class="validate" value="{{ $trip->end_km }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <p>Id do Veículo</p>
            <input name="vehicle_id" type="number"class="validate" value="{{ $trip->vehicle_id }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <p>Motoristas da Viagem</p>
            <ol>
                @foreach($trip->drivers as $driver)
                    <li style="color:grey;">{{ $driver->name }}</li>
                @endforeach
            </ol>
            <p>Todos Motoristas</p>
            @foreach ($drivers as $driver)
                <input type="checkbox" id="driver_{{ $driver->id }}" name="drivers[]" value="{{ $driver->id }}">
                <label for="driver_{{ $driver->id }}">{{ $driver->name }}</label>
            @endforeach
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