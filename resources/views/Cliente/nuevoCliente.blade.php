@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection




@section('principal')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nuevo Vehiculo</h4>
            <form class="form-sample" action="{{ route('Clientes.store') }}" METHOD="POST">
                @csrf
                
                <p class="card-description">

                </p>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">DNI</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="dni" name="dni">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telefono</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="telefono" id="telefono" />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Direccion</label>
                            <div class="col-sm-9">
                                <input type="TEXT" step="any" id="direccion" name="direccion" class="form-control">
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
