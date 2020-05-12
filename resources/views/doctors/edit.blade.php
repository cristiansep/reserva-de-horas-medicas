@extends('layouts.panel')

@section('content')
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar Médico</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('doctors')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
            </div>
          </div>
        </div>
        <div class="card-body">

            @if ($errors -> any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error) 
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action=" {{ url('doctors/'.$doctor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre del médico</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$doctor->name) }}" required>
                </div>
    
                <div class="form-group">
                    <label for="email">Coreos electronico</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email',$doctor->email) }}">
                </div>

                <div class="form-group">
                    <label for="rut">Rut</label>
                    <input type="rut" name="rut" id="rut" class="form-control" value="{{ old('rut',$doctor->rut) }}">
                </div>

                <div class="form-group">
                    <label for="addres">Direccion</label>
                    <input type="text" name="addres" id="addres" class="form-control" value="{{ old('addres',$doctor->address) }}">
                </div>

                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone',$doctor->phone) }}">
                </div>

                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="text" name="password" id="password" class="form-control" value="">
                  <em>ingrese un valor si desea modificar la contraseña</em>
                </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    
            </form>
        </div>
      </div> 
@endsection
