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
                        <td>{{ Date('d/m/Y', strtotime($averia->fecha_registro)) }}</td>
                        @if ($averia->fecha_finalizacion != null && $averia->fecha_finalizacion != '')
                            <td>{{ Date('d/m/Y', strtotime($averia->fecha_finalizacion)) }}</td>
                        @else
                            <td>{{ $averia->fecha_finalizacion }}</td>
                        @endif
                        <td>{{ $averia->estado->estado }}</td>
                        <td id="{{ $averia->cliente_id }}">{{ $averia->cliente->nombre }}</td>
                        <td>{{ $averia->vehiculo->matricula }}</td>
                        <td id="{{ $averia->user_id }}">{{ $averia->user->nombre }}</td>
                        <td>
                            <div class="d-flex align-items-center">

                                <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3"
                                    data-toggle="modal" data-target=".bd-example-modal-lg" name=botonEditar>
                                    <i class="fa-regular fa-pen-to-square" style=" font-size: 1.3rem !important;"></i>
                                </button>
                                @if (Auth::user()->rol_id == 1)
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm btn-icon-text mr-3"
                                        name="botonBorrar"><i class="fa-solid fa-trash"
                                            style=" font-size: 1.3rem !important;"></i>
                                    </button>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{-- modal editar --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" id="modalModificar">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <input type="hidden" value="" id="idAveriaHidden" />
                <div class="row text-center">
                    <div class="col-md-12">

                        <h4>
                            Modificar Averia</h4>
                    </div>
                </div>
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

            setTimeout(function() {
                $('.dataTables_filter input').css('border-width', '2px');
                $('.dataTables_filter input').css('border-color', '#3198FD');
                $('.dataTables_filter input').css('border-radius', '30%');
                $('.dataTables_filter label').css('font-weight', 'bold');
            }, 0000);


        });
        indiceFila = "";
        $('button[name=botonBorrar').click(function(e) {
            id = $(this).parents("tr").attr('id')
            fila = $(this).parents("tr")

            Swal.fire({
                    title: "Deseas Eliminar la Averia del Vehiculo ",
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
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Averia Borrada con Éxito',
                                    showConfirmButton: false,
                                    timer: 1500
                                });


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
            fila = $("#" + $("#idAveriaHidden").val()) //buscamo la fila que tenga el id de la averia
            //console.log(fila.find("td:eq(1)").html())
            estado_id = "3"
            IdAveria = $("#idAveriaHidden").val()
            fecha_registro = $("#fecha_registro").val()
            fecha_finalizacion = $("#fecha_finalizacion").val()
            nombre = $("#nombre").val()
            user_id = $("#selectMecanico").val()
            cliente_id = $("#selectCliente").val()
            NombreCliente = $("#selectCliente option:selected").text()
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

                    if ($('#checkProcesoModificar').prop('checked')) {
                        estado_id = "Proceso"
                    } else if ($('#checkPendiendteModificar').prop('checked')) {
                        estado_id = "Pendiente"
                    } else {
                        estado_id = "Terminado"
                    }


                    console.log($("#selectMecanico option:selected").text())
                    fila.find("td:eq(0)").html(nombre)
                    fila.find("td:eq(1)").html(fecha_registro)
                    fila.find("td:eq(2)").html(fecha_finalizacion)
                    fila.find("td:eq(3)").html(estado_id)
                    fila.find("td:eq(4)").html($("#selectCliente option:selected").text())
                    fila.find("td:eq(5)").html($("#selectPrueba option:selected").text())
                    fila.find("td:eq(6)").html($("#selectMecanico option:selected").text())
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Averia de ' + NombreCliente + ' Modificada con exito',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    jQuery.noConflict();
                    $('#modalModificar').modal('hide');
                    $('#modalModificar').modal('hide');
                }
            });
        });

        $('button[name=botonEditar').click(function(e) {

            idAveriaFila = $(this).parents("tr").attr('id');
            TodasAverias = <?php echo $TodasAverias; ?>;
            laAveria = [];

            for (i = 0; i < TodasAverias.length; i++) {

                if (TodasAverias[i]["id"] == idAveriaFila) {
                    laAveria = TodasAverias[i]
                }
            }
            $("#idAveriaHidden").val(laAveria["id"])
            $("#selectMecanico option[value=" + laAveria["user_id"] + "]").attr(
                "selected", true);
            $("#selectCliente option[value=" + laAveria["cliente_id"] + "]").attr(
                "selected", true);
            if (laAveria["estado_id"] == "1") {
                $('#checkPendiendteModificar').prop('checked', true)
            } else if (laAveria["estado_id"] == "2") {
                $('#checkProcesoModificar').prop('checked', true)
            } else
                $('#checkTermiandoModificar').prop('checked', true)

            $("#fecha_registro").val(laAveria["fecha_registro"])
            $("#fecha_finalizacion").val(laAveria["fecha_finalizacion"])
            $("#nombre").val(laAveria["nombre"])

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/listarVehiculosParaModificarAveria/" + laAveria["id"],
                method: "GET",
                data: {
                    id: laAveria["id"],
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
