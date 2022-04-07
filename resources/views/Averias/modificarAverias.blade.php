@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection

@section('pagActual')
    <span class="nav-profile-name" style="font-size: 140%;">Modificar Averia {{ $Averia->nombre }}</span>
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
                <h4 class="card-title">Vehículo {{ $Averia->vehiculo->marca }} {{ $Averia->vehiculo->modelo  }} {{ $Averia->vehiculo->matricula  }}</h4>
                <form class="forms-sample" action="{{ route('Averias.store') }}">
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre"
                            value="{{ old('nombre', $Averia->nombre) }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Fecha Regidtro</label>
                        <input type="text" class="form-control" id="fecha_registro" placeholder="Fecha Registro" name="fecha_registro"
                            value="{{ old('fecha_registro', $Averia->fecha_registro) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Fecha Finalizacion</label>
                        <input type="email" class="form-control" id="fecha_finalizacion" placeholder="fecha finalizacion" name="fecha_finalizacion"
                            value="{{ old('fecha_finalizacion', $Averia->fecha_finalizacion) }}">
                    </div>
                    
                     <div class="form-group">
                      <label for="estado">Estado</label>
                        <select class="form-control" id="estado">
                            @foreach ($todoEstados as $estado )
                            @if($estado->id == $Averia->estado_id)
                                <option value="{{ $estado->id }}" selected>{{ $estado->estado }}</option>
                                @else
                                 <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                 @endif
                            @endforeach
                          
                          
                        </select>
                      </div> 
                    {{-- <div class="form-group"> --}}
                        {{-- <label for="exampleInputCity1">DNI</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="DNI" name="dni"
                            value="{{ old('dni', $Averia->dni) }}">
                    </div> --}}
                    <button type="submit" class="btn btn-success btn-rounded btn-fw">Confirmar</button>
                    <a  href="{{ route('Averias.index',$Averia->Averia_id) }}"><button class="btn btn-info btn-rounded btn-fw">Cancelar</button></a>

                </form>
            </div>
        </div>
    </div>
@endsection


@section('jspagina')

@endsection
