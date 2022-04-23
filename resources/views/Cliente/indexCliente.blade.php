@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ Auth::user()->nombre }}</p>
@endsection

@section('pagActual')
    <span class="nav-profile-name" style="font-size: 140%;">Clientes</span>
@endsection


@section('principal')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ $message }}
        </div>
    @endif


    <a href="{{ route('Clientes.create') }}">
        <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nuevo
            Cliente</button></a>

    <div class="table-responsive pt-3">
        <form action="">
            @csrf

            <table class="table table-striped project-orders-table" id="tablaClientes">
                <thead>
                    <tr>
                        <th class="ml-5">Nombre</th>
                        <th>DNi</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($TodosClientes as $cliente)
                        <tr id="{{ $cliente->id }}" class="informacion">
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->dni }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->direccion }}</td>
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
                <input type="hidden" value="" id="idClienteHidden" />
                <div class="row text-center">
                    <div class="col-md-12">

                        <h4>
                            Modificar Cliente</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombreModificar">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">DNI</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="dniModificar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telefono</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="telefonoModificar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="emailModificar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Direccion</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="direccionModificar"
                                    id="direccionModificar" />
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

        }); //ready for



        indiceFila = "";
        $('button[name=botonBorrar').click(function(e) {
            //console.log("entro en borrar")
            id = $(this).parents("tr").attr('id')
            console.log(id)
            fila = $(this).parents("tr")
            NombreCliente = fila.find("td:eq(0)").html()

            Swal.fire({
                    title: "Deseas Eliminar El Cliente de " + NombreCliente,
                    text: "SE ELIMINARÁ SUS FACTURAS Y ClienteS",
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
                            url: "eliminarCliente/" + id,
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
                                    title: 'Cliente Borrado con Éxito',
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
            fila = $("#" + $("#idClienteHidden").val()) //buscamo la fila que tenga el id de la averia
            //console.log(fila.find("td:eq(1)").html())

            IdCliente = $("#idClienteHidden").val()
            nombre = $("#nombreModificar").val()
            dni = $("#dniModificar").val()
            telefono = $("#telefonoModificar").val()
            email = $("#emailModificar").val()
            direccion = $("#direccionModificar").val()
            NombreCliente = $("nombreModificar").val()
            console.log(IdCliente + " " + nombre + " " + dni+ " " + " " + direccion )

            var token = '{{ csrf_token() }}'
          
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ModificarCliente",
                type: "GET",
                data: {
                    id: IdCliente,
                    nombre: nombre,
                    dni: dni,
                    telefono: telefono,
                    email: email,
                    direccion: direccion,
                },
                dataType: "html",
                success: function(elemento) {


                    fila.find("td:eq(0)").html(nombre)
                    fila.find("td:eq(1)").html(dni)
                    fila.find("td:eq(2)").html(telefono)
                    fila.find("td:eq(3)").html(email)
                    fila.find("td:eq(4)").html(direccion)
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente' + NombreCliente + ' Modificado con exito',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    jQuery.noConflict();
                    $('#modalModificar').modal('hide');
                }
            });
        });

        $('button[name=botonEditar').click(function(e) {

            idClienteFila = $(this).parents("tr").attr('id');
            TodosClientes = <?php echo $TodosClientes; ?>;
            elCliente = [];

            for (i = 0; i < TodosClientes.length; i++) {

                if (TodosClientes[i]["id"] == idClienteFila) {
                    elCliente = TodosClientes[i]
                }
            }
            $("#idClienteHidden").val(elCliente["id"])


            $("#nombreModificar").val(elCliente["nombre"])
            $("#dniModificar").val(elCliente["dni"])
            $("#telefonoModificar").val(elCliente["telefono"])
            $("#emailModificar").val(elCliente["email"])
            $("#direccionModificar").val(elCliente["direccion"])
        });
    </script>
@endsection
