@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection




@section('principal')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ $message }}
        </div>
    @endif
    <div class="table-responsive pt-3">
        <a href="{{ route('Averias.create') }}">
            <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nueva
                Averia</button></a>
        <table class="table table-striped project-orders-table table-hover" id="tablaClientes"
            style="text-align: center !important;">
            <thead>
                <tr>
                    <th class="ml-5">Nombre</th>
                    <th>Fecha de Registro</th>
                    <th>Fecha de Finalizacion</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                    <th>Vehiculo</th>
                    <th>Mecánico</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TodasAverias as $averia)
                    <tr id="{{ $averia->id }}" class="informacion">
                        <td>{{ $averia->nombre }}</td>
                        <td>{{ $averia->fecha_registro }}</td>
                        <td>{{ $averia->fecha_finalizacion }}</td>
                        <td>{{ $averia->estado->estado }}</td>
                        <td>{{ $averia->cliente->nombre }}</td>
                        <td>{{ $averia->vehiculo->matricula }}</td>
                        <td id="{{$averia->user_id}}">{{ $averia->user->nombre }}</td>
                        <td>
                            <div class="d-flex align-items-center">

                                <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3"
                                    data-toggle="modal" data-target=".bd-example-modal-lg" id="editar">
                                    <i class="fa-regular fa-pen-to-square" style=" font-size: 1.3rem !important;"></i>
                                </button>
                                {{-- <input type="hidden" value="{{ $averia->id}}" id="averia_id"> --}} <button type="button"
                                    class="btn btn-danger btn-rounded btn-sm btn-icon-text mr-3"><i
                                        class="fa-solid fa-trash" style=" font-size: 1.3rem !important;" id="borrar"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
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
                            <label class="col-sm-3 col-form-label">Vehiculo</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="selectPrueba" name="vehiculo_id">
                                    <option value="p">Elige un Vehiculo</option>

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
                                    @foreach ($TodosMecanicos as $mecanico)
                                        <option value="{{ $mecanico->id }}">{{ $mecanico->nombre }}</option>
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
                                            <input type="radio" checked="" name="estado_id" value="1">
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
                                            <input type="radio" name="estado_id" value="2">
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
                                            <input type="radio" name="estado_id" value="3">
                                            <span class="toggle-slider round"></span>
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('jspagina')
    <script>
        $(document).ready(function() {

            $('#tablaClientes').dataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "bInfo": false,
                "bLengthChange": false,
            });

        });

        $('#borrar').click(function(e) {
            id = $(this).parents("tr").attr('id')
            fila = $(this).parents("tr")

            Swal.fire({
                    title: "Deseas Eliminar la Averia del Vehiculo " + "pepe",
                    text: "¿Eliminar?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar",
                    confirmButtonColor: '#3198FD',
                    cancelButtonColor: 'red',
                })
                .then(resultado => {
                    if (resultado.value) {
                        // Hicieron click en "Sí"
                        // $(location).attr("href","{{ route('Averias.index') }}")

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "eliminarAveria/" + id,
                            method: "POST",
                            data: {
                                id: id,
                            },
                            dataType: "html",
                            success: function(elemento) {
                                fila.remove();

                            }
                        });

                    } else {
                        // Dijeron que no
                        $(location).attr("href", "{{ route('Averias.index') }}")
                    }
                });



        });
        $('#editar').click(function(e) {

            id = $(this).closest("tr").attr("id"); //ID DE LA AVERIA 
            nombre = $(this).closest("tr").find("td:eq(0)").html()
            fecha_registro = $(this).closest("tr").find("td:eq(1)").html()
            fecha_finalizacion = $(this).closest("tr").find("td:eq(2)").html()
            estado = $(this).closest("tr").find("td:eq(3)").html()
            cliente = $(this).closest("tr").find("td:eq(4)").html()
            vehiculo = $(this).closest("tr").find("td:eq(5)").html()
            mecanicoId = $(this).closest("tr").find("td:eq(6)").attr("id")
         

             $("#selectMecanico option[value="+mecanicoId+"]").attr("selected", true);

            id1 = parseInt(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/listarVehiculosParaModificarAveria/" + id,
                method: "GET",
                data: {
                    id: 11,
                },
                dataType: "html",
                success: function(elemento) {

                    $("#selectPrueba").html(elemento);
                }
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
