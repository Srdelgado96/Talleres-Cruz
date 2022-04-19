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
                    <th class="ml-5">Descripción</th>
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
                        <td id="{{ $averia->cliente_id }}">{{ $averia->cliente->nombre }}</td>
                        <td>{{ $averia->vehiculo->matricula }}</td>
                        <td id="{{ $averia->user_id }}">{{ $averia->user->nombre }}</td>
                        <td>
                            <div class="d-flex align-items-center">

                                <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3"
                                    data-toggle="modal" data-target=".bd-example-modal-lg" id="editar">
                                    <i class="fa-regular fa-pen-to-square" style=" font-size: 1.3rem !important;"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-rounded btn-sm btn-icon-text mr-3"><i
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
        aria-hidden="true" id="modalModificar">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <input type="hidden" value="" id="idAveriaHidden" />
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
                                            <input type="radio" name="estado_id" value="1" id="checkPendiendteModificar">
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
                                            <input type="radio" name="estado_id" value="2" id="checkProcesoModificar">
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
                                            <input type="radio" name="estado_id" value="3" id="checkTermiandoModificar">
                                            <span class="toggle-slider round"></span>
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha Registro</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="fecha_registro" id="fecha_registro" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha Finalizacion</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="fecha_finalizacion"
                                    id="fecha_finalizacion" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">

                            <div class="col-sm-12">
                                <label for="exampleTextarea1">Descripción de la Averia</label>
                                <textarea class="form-control" id="nombre" name="nombre" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-warning btn-rounded btn-fw" id="botonModificarModal">Modificar</button>
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
        indiceFila = "";
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

        $("#botonModificarModal").click(function(e) {
            e.preventDefault();
            fila = $("#tablaClientes").find("tr").eq(indiceFila + 1)
                .html() //+1 porque cuenta la cabecera de la tabla como fila
            //alert( fila.find("td"))
            estado_id = "3"
            IdAveria = $("#idAveriaHidden").val()
            fecha_registro = $("#fecha_registro").val()
            fecha_finalizacion = $("#fecha_finalizacion").val()
            nombre = $("#nombre").val()
            user_id = $("#selectMecanico").val()
            cliente_id = $("#selectCliente").val()
            vehiculo_id = $("#selectPrueba").val()

            if ($('#checkProcesoModificar').prop('checked')) {
                estado_id = "2"
            } else if ($('#checkPendiendteModificar').prop('checked')) {
                estado_id = "1"
            } else {
                estado_id = "3"
            }

            var token = '{{ csrf_token() }}'
            console.log(cliente_id)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ModificarAveria",
                type: "GET",
                data: {
                    id: IdAveria,
                    fecha_registro: fecha_registro,
                    fecha_finalizacion: fecha_finalizacion,
                    nombre: nombre,
                    user_id: user_id,
                    cliente_id: cliente_id,
                    vehiculo_id: vehiculo_id,
                    estado_id: estado_id,

                },
                dataType: "html",
                success: function(elemento) {
                    //alert("entro en el success")
                    jQuery.noConflict();
                    $('#modalModificar').modal('hide');


                }
            });
        });

        $('#editar').click(function(e) {
            //MUESTRA EL MODAL CON LOS DATOS DE LA AVERIA OBTENIENDOLO DE LA TABLA DESDE EL CLIENTE

            // id = $(this).closest("tr").attr("id"); //ID DE LA AVERIA 
            // nombre = $(this).closest("tr").find("td:eq(0)").html()
            // fecha_registro = $(this).closest("tr").find("td:eq(1)").html()
            // fecha_finalizacion = $(this).closest("tr").find("td:eq(2)").html()
            // estado = $(this).closest("tr").find("td:eq(3)").html()
            // clienteId = $(this).closest("tr").find("td:eq(4)").attr("id");
            // vehiculoId = $(this).closest("tr").find("td:eq(5)").attr("id")
            // mecanicoId = $(this).closest("tr").find("td:eq(6)").attr("id")
            // $("#selectMecanico option[value=" + mecanicoId + "]").attr("selected", true);
            // $("#selectCliente option[value=" + clienteId + "]").attr("selected", true);

            // if (estado == "Pendiente") {
            //     $('#checkPendiendteModificar').prop('checked', true)
            // } else if (estado == "Proceso") {
            //     $('#checkProcesoModificar').prop('checked', true)
            // } else
            //     $('#checkTermiandoModificar').prop('checked', true)

            // id = parseInt(id);


            //UTILIZANDO LOS VALORES DESDE EL SERVIDOR RELLENAMOS EL MODAL, SABIENDO EL INDICE DE LA FILA SABEMO LA POSICION EN TODASAVERIAS
            indiceFila = $(this).closest("tr").index(); //ID DE LA AVERIA 
            TodasAverias = <?php echo $TodasAverias; ?>;
            $("#idAveriaHidden").val(TodasAverias[indiceFila]["id"])
            $("#selectMecanico option[value=" + TodasAverias[indiceFila]["user_id"] + "]").attr(
                "selected", true);
            $("#selectCliente option[value=" + TodasAverias[indiceFila]["cliente_id"] + "]").attr(
                "selected", true);
            if (TodasAverias[indiceFila]["estado_id"] == "1") {
                $('#checkPendiendteModificar').prop('checked', true)
            } else if (TodasAverias[indiceFila]["estado_id"] == "2") {
                $('#checkProcesoModificar').prop('checked', true)
            } else
                $('#checkTermiandoModificar').prop('checked', true)

            $("#fecha_registro").val(TodasAverias[indiceFila]["fecha_registro"])
            $("#fecha_finalizacion").val(TodasAverias[indiceFila]["fecha_finalizacion"])
            $("#nombre").val(TodasAverias[indiceFila]["nombre"])

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/listarVehiculosParaModificarAveria/" + TodasAverias[indiceFila]["id"],
                method: "GET",
                data: {
                    id: TodasAverias[indiceFila]["id"],
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
                url: "/listarVehiculos/" + id,
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
