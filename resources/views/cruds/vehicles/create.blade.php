@extends('cruds.layouts.app')

@section('content')
<body>
      <h1 style="padding: 10px;">Cadastrar Veículos</h1>
      @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <div class="row">
      <form class="col s12" action="{{ route('vehicles.store') }}" method="POST">
        @csrf()
        <div class="row">
          <div class="input-field inline col s3">
            <input name="model" type="text" placeholder="Modelo" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s2">
            <input name="year" type="number" placeholder="Ano" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <input name="km_acquisition" type="number" placeholder="Km de Aquisição" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <input name="date_acquisition" type="date" placeholder="Data de Aquisição" class="datepicker">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <input name="renavam" type="text" placeholder="RENAVAM" class="validate">
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