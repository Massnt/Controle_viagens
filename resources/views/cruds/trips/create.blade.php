@extends('cruds.layouts.app')

@section('content')
<body>
      <h1 style="padding: 10px;">Cadastrar Viagens</h1>
      @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <div class="row">
      <form class="col s12" action="{{ route('trips.store') }}" method="POST">
        @csrf()
        <div class="row">
            <label style="display: flex; justify-content: left; padding: 0px 10px;">Data de Inicio</label>
          <div class="input-field inline col s3">
            <input name="start_date" type="date" class="datepicker">
          </div>
        </div>
        <div class="row">
            <label style="display: flex; justify-content: left; padding: 0px 10px;">Data Final</label>
          <div class="input-field inline col s3">
            <input name="end_date" type="date" class="datepicker">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s2">
            <input name="start_km" type="number" placeholder="Km  Inicial" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s2">
            <input name="end_km" type="number" placeholder="Km  Final" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <input name="vehicle_id" type="number" placeholder="Id do Veículo" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <p>Motoristas</p>
            @foreach ($drivers as $driver)
                <input type="checkbox" id="driver_{{ $driver->id }}" name="drivers[]" value="{{ $driver->id }}">
                <label for="driver_{{ $driver->id }}">{{ $driver->name }}</label>
            @endforeach
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
        <i class="material-icons right">send</i>
    </button>
    <a href="{{ route('vehicles.index') }}" style="color: white;"><button class="btn waves-effect waves-light" 
    name="action">Home
        <i class="material-icons right">home</i></a>
      </form>
      
    </div>
          
  </body>
@endsection