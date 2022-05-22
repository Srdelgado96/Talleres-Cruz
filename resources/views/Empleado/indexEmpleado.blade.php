@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection




@section('principal')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            {{ $message }}
        </div>
    @endif
    <div class="table-responsive pt-3">
        <a href="{{ route('Empleados.create') }}">

            <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nuevo
                Empleado</button>
        </a>


        <table class="table table-striped project-orders-table" id="tablaClientes" style="text-align: center !important">
            <thead>
                <tr>
                    <th class="ml-5">Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Permiso</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TodosEmpleados as $empleado)
                    <tr id="{{ $empleado->id }}" class="informacion">
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->rol->permiso }}</td>
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
    {{-- Modal EditaR --}}
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
                            <label class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                            <label class="col-sm-3 col-form-label">Permiso</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="selectPermiso" name="permiso_id">
                                    <option value="p">Permiso del empleado</option>
                                    @foreach ($todosPermiso as $permiso)
                                        <option value="{{ $permiso->id }}">{{ $permiso->permiso }}
                                        </option>
                                    @endforeach
                                </select>
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
            console.log(id)

            Swal.fire({
                    title: "Deseas Eliminar al Empleado",
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
                            url: "eliminarEmpleado/" + id,
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
                                    title: 'Empleado Borrado con Éxito',
                                    showConfirmButton: false,
                                    timer: 1500
                                });


                            }
                        });

                    } else {
                        // Dijeron que no
                        swal.close()
                        //$(location).attr("href", "{{ route('Empleados.index') }}")
                    }
                });



        });
        $('button[name=botonEditar').click(function(e) {

            idEmpleado = $(this).parents("tr").attr('id');
            TodosEmpleados = <?php echo $TodosEmpleados; ?>;
            ElEmpleado = [];
            console.log(TodosEmpleados[0]["id"])

            for (i = 0; i < TodosEmpleados.length; i++) {

                if (TodosEmpleados[i]["id"] == idEmpleado) {
                    ElEmpleado = TodosEmpleados[i]
                }
            }
            $("#idAveriaHidden").val(ElEmpleado["id"])
            $("#selectPermiso option[value=" + ElEmpleado["rol_id"] + "]").attr(
                "selected", true);

            $("#email").val(ElEmpleado["email"])
            $("#telefono").val(ElEmpleado["telefono"])
            $("#nombre").val(ElEmpleado["nombre"])
        });

        $("#botonModificarModal").click(function(e) {
            e.preventDefault();
            fila = $("#" + $("#idAveriaHidden").val()) //buscamo la fila que tenga el id de la averia
            IdEmpleado = $("#idAveriaHidden").val()
            nombre = $("#nombre").val()
            rol_id = $("#selectPermiso").val()
            telefono = $("#telefono").val()
            email = $("#email").val()

            var token = '{{ csrf_token() }}'
            //console.log(cliente_id)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ModificarEmpleado",
                type: "GET",
                data: {
                    id: IdEmpleado,
                    nombre: nombre,
                    rol_id: rol_id,
                    telefono: telefono,
                    email: email,
                },
                dataType: "html",
                success: function(elemento) {
                    console.log($("#selectMecanico option:selected").text())
                    fila.find("td:eq(0)").html(nombre)
                    fila.find("td:eq(1)").html(email)
                    fila.find("td:eq(2)").html(telefono)
                    fila.find("td:eq(3)").html($("#selectPermiso option:selected").text())
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Empleado  ' + nombre + ' Modificado con exito',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    jQuery.noConflict();
                    $('#modalModificar').modal('hide');
                    $('#modalModificar').modal('hide');
                }
            });
        });
    </script>
@endsection
