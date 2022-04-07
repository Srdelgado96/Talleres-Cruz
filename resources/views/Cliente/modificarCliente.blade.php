@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection

@section('pagActual')
    <span class="nav-profile-name" style="font-size: 140%;">Modificar Cliente {{ $Cliente->nombre }}</span>
@endsection


@section('principal')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{ $message }}
        </div>
    @endif

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modificar Cliente {{ $Cliente->nombre }}</h4>
                <form class="forms-sample" action="{{ route('Clientes.store') }}">
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre"
                            value="{{ old('nombre', $Cliente->nombre) }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Teléfono</label>
                        <input type="text" class="form-control" id="Teléfono" placeholder="Teléfono" name="telefono"
                            value="{{ old('telefono', $Cliente->telefono) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                            value="{{ old('email', $Cliente->email) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Contrsaseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña"
                            name="email">
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div> --}}
                    <div class="form-group">
                        <label for="exampleInputCity1">DNI</label>
                        <input type="text" class="form-control" id="dni" placeholder="DNI" name="dni"
                            value="{{ old('dni', $Cliente->dni) }}">
                    </div>
                    <button type="submit" class="btn btn-success btn-rounded btn-fw">Confirmar</button>
                    <a  href="{{ route('Clientes.index',$Cliente->Cliente_id) }}"><button class="btn btn-info btn-rounded btn-fw">Cancelar</button></a>

                </form>
            </div>
        </div>
    </div>
@endsection


@section('jspagina')

@endsection
