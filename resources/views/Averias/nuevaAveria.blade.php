@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection




@section('principal')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nueva Avería</h4>
            <form class="form-sample" action="{{ route('Averias.store') }}" METHOD="POST">
                @csrf
                
                <p class="card-description">

                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cliente</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="selectCliente" name="cliente_id">
                                    <option value="p">Eligue un Cliente</option>
                                    @foreach ($todosClientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vehiculo</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="selectPrueba" name="vehiculo_id">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mecánico</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="selectMecanico" name="user_id">
                                    <option value="p">Eligue un Mecánico</option>
                                    @foreach ($todosMecanicos as $mecanico)
                                        <option value="{{ $mecanico->id }}">{{ $mecanico->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Estado</label>
                            <div class="col-sm-3">
                                <div class="form-group row">
                                    <div class="col">
                                        <p class="mb-2">Pendiente</p>
                                        <label class="toggle-switch toggle-switch-danger">
                                            <input type="radio" checked="" name="estado_id">
                                            <span class="toggle-slider round"></span>
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group row">
                                    <div class="col">
                                        <p class="mb-2">Proceso</p>
                                        <label class="toggle-switch toggle-switch-warning">
                                            <input type="radio" name="estado_id">
                                            <span class="toggle-slider round"></span>
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group row">
                                    <div class="col">
                                        <p class="mb-2">Terminado</p>
                                        <label class="toggle-switch toggle-switch-success">
                                            <input type="radio" name="estado_id">
                                            <span class="toggle-slider round"></span>
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label for="exampleTextarea1">Descripción de la Averia</label>
                    <textarea class="form-control" id="nombre" name="nombre" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-rounded btn-fw" value="pepe">
                </div>
            </form>
        </div>
    </div>
@endsection


@section('jspagina')
    <script>
        $(document).ready(function() {


            $('#select').selectize({
                persist: false,
            });


        });
        $('#selectCliente').change(function(e) {
            e.preventDefault();

            id = parseInt($(this).val());

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/listarVehiculos",
                method: "POST",
                data: {
                    id: id,
                },
                dataType: "html",
                success: function(elemento) {

                    $("#selectPrueba").html(elemento);
                }
            });
        });
    </script>
@endsection
