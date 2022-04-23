@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection




@section('principal')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nueva Producto</h4>
            <form class="form-sample" action="{{ route('Productos.store') }}" METHOD="POST">
                @csrf
                
                <p class="card-description">

                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                        <input type="text" id="nombre"name="nombre" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Precio</label>
                            <div class="col-sm-9">
                                <input type="number" step="any" id="precio" name="precio" class="form-control">
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
        $('#selectCliente').change(function(e) {
            e.preventDefault();

            id = parseInt($(this).val());
            

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/listarVehiculos/"+id,
                method: "GET",
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
