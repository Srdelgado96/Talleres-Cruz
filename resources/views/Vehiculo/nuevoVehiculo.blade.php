@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection




@section('principal')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nuevo Vehiculo</h4>
            <form class="form-sample" action="{{ route('Vehiculos.store') }}" METHOD="POST">
                @csrf
                
                <p class="card-description">

                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cliente</label>
                            <div class="col-sm-9">
                         <select class="form-control" id="selectCliente" name="cliente_id">
                                    <option value="p">Elige un Cliente</option>
                                    @foreach ($TodosClientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Matricula</label>
                            <div class="col-sm-9">
                                <input type="TEXT" step="any" id="matricula" name="matricula" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Modelo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="modelo" name="modelo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marca</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="marca" name="marca">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kilometros</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kilometros" id="kilometros" />
                            </div>
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-rounded btn-fw" value="Crear">
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
        // $('#selectCliente').change(function(e) {
        //     e.preventDefault();

        //     id = parseInt($(this).val());
            

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "/listarVehiculos/"+id,
        //         method: "GET",
        //         data: {
        //             id: id,
        //         },
        //         dataType: "html",
        //         success: function(elemento) {

        //             $("#selectPrueba").html(elemento);
        //         }
        //     });
        // });

    
    </script>
@endsection
