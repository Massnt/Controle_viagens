@extends('cruds.layouts.app')

@section('content')
  <body>
      <h1 style="padding: 10px;">Editar Motorista {{ $driver->name}}</h1>
      @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <div class="row">
      <form class="col s12" action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf()
        @method('put')
        <div class="row">
          <div class="input-field inline col s3">
            <input name="name" type="text" placeholder="Nome" class="validate" value="{{ $driver->name }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s2">
            <input name="cnh" type="text" placeholder="CNH" class="validate" value="{{ $driver->cnh }}">
          </div>
        </div>
        <div class="row">
          <div class="input-field inline col s3">
            <p>{{ $driver->date_of_birth->format('d/m/Y') }}</p>
            <input name="date_of_birth" type="date" class="datepicker">
            
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Atualizar
        <i class="material-icons right">send</i>
    </button>
      </form>
    </div>
          
  </body>
@endsection