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

    <a href="{{ route('Vehiculos.create') }}">
        <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nuevo
            Vehiculo</button></a>
    <div class="table-responsive pt-3">
        <form action="">
            @csrf

            <table class="table table-striped project-orders-table" id="tablaClientes">
                <thead>
                    <tr>
                        <th class="ml-5">Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Kilometro</th>
                        <th>Cliente</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Todosvehiculos as $vehiculo)
                        <tr id="{{ $vehiculo->id }}" class="informacion">
                            <td>{{ $vehiculo->matricula }}</td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->kilometros }}</td>
                            <td>{{ $vehiculo->cliente->nombre }}</td>
                            <td>
                                <div class="d-flex align-items-center">


                                    <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3"
                                        data-toggle="modal" data-target=".bd-example-modal-lg" name=botonEditar>
                                        <i class="fa-regular fa-pen-to-square" style=" font-size: 1.3rem !important;"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-rounded btn-sm btn-icon-text mr-3"
                                        name="botonBorrar"><i class="fa-solid fa-trash"
                                            style=" font-size: 1.3rem !important;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>



    {{-- MODAL Editar --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" id="modalModificar">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <input type="hidden" value="" id="idVehiculoHidden" />
                <div class="row text-center">
                    <div class="col-md-12">

                        <h4>
                            Modificar Vehiculo</h4>
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
                            <label class="col-sm-3 col-form-label">Matricula</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="matriculaModificar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Modelo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="modeloModificar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marca</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="marcaModificar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kilometros</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kilometrosModificar"
                                    id="kilometrosModificar" />
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kilometros</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kilometrosModificar" id="kilometrosModificar" />
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
                </div> --}}
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



        }); // fin del ready
        indiceFila = "";
        $('button[name=botonBorrar').click(function(e) {
            //console.log("entro en borrar")
            id = $(this).parents("tr").attr('id')
            fila = $(this).parents("tr")
            NombreCliente = fila.find("td:eq(4)").html()

            Swal.fire({
                    title: "Deseas Eliminar El Vehiculo de " + NombreCliente,
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


                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "eliminarVehiculo/" + id,
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
                                    title: 'Vehículo Borrada con Éxito',
                                    showConfirmButton: false,
                                    timer: 1500
                                });


                            }
                        });

                    } else {
                        // Dijeron que no

                    }
                });



        });

        $("#botonModificarModal").click(function(e) {
            e.preventDefault();
            fila = $("#" + $("#idVehiculoHidden").val()) //buscamo la fila que tenga el id de la averia
            //console.log(fila.find("td:eq(1)").html())
            
            IdVehiculo = $("#idVehiculoHidden").val()
            matricula = $("#matriculaModificar").val()
            marca = $("#marcaModificar").val()
            modelo = $("#modeloModificar").val()
            kilometros = $("#kilometrosModificar").val()
            cliente_id = $("#selectCliente").val()
            NombreCliente= $("#selectCliente option:selected").text()
           console.log(IdVehiculo + " "+matricula+" "+marca+" "+" "+ modelo+" "+cliente_id)

            var token = '{{ csrf_token() }}'
            console.log(cliente_id)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ModificarVehiculo",
                type: "GET",
                data: {
                    id: IdVehiculo,
                    matricula: matricula,
                    marca: marca,
                    modelo: modelo,
                    kilometros: kilometros,
                    cliente_id: cliente_id,
                },
                dataType: "html",
                success: function(elemento) {

                    
                    fila.find("td:eq(0)").html(matricula)
                    fila.find("td:eq(1)").html(marca)
                    fila.find("td:eq(2)").html(modelo)
                    fila.find("td:eq(3)").html(kilometros)
                    fila.find("td:eq(4)").html($("#selectCliente option:selected").text())
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Vehiculo de '+NombreCliente+' Modificado con exito',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    jQuery.noConflict();
                    $('#modalModificar').modal('hide');
                }
            });
        });

        $('button[name=botonEditar').click(function(e) {

            idVehiculoFila = $(this).parents("tr").attr('id');
            Todosvehiculos = <?php echo $Todosvehiculos; ?>;
            elVehiculo = [];

            for (i = 0; i < Todosvehiculos.length; i++) {

                if (Todosvehiculos[i]["id"] == idVehiculoFila) {
                    elVehiculo = Todosvehiculos[i]
                }
            }
            $("#idVehiculoHidden").val(elVehiculo["id"])
            $("#selectCliente option[value=" + elVehiculo["cliente_id"] + "]").attr("selected", true);

            $("#matriculaModificar").val(elVehiculo["matricula"])
            $("#modeloModificar").val(elVehiculo["modelo"])
            $("#marcaModificar").val(elVehiculo["marca"])
            $("#kilometrosModificar").val(elVehiculo["kilometros"])
        });
    </script>
@endsection
