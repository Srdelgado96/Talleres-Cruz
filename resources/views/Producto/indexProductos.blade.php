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

        <a href="{{ route('Productos.create') }}">
            <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nuevo
                Producto</button></a>
        <table class="table table-striped project-orders-table" id="tablaClientes">
            <thead>
                <tr>
                    <th class="ml-5">Nombre</th>
                    <th>Precio</th>


                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TodasProductos as $producto)
                    <tr id="{{ $producto->id }}" class="informacion">
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }} €</td>
                        <td>
                            <div class="d-flex align-items-center">

                                <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3"
                                    data-toggle="modal" data-target=".bd-example-modal-xl" name="botonEditar">
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

    </div>

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" id="modalModificar">
        <div class="modal-dialog modal-xl">

            <div class="modal-content">
                <input type="hidden" value="" id="idProductoHidden" />
                <div class="row text-center">
                    <div class="col-md-12">

                        <h4>
                            Modificar Producto</h4>
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
                            <label class="col-sm-3 col-form-label">Precio</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" step="any" id="precioModificar">
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

        }); //fin del ready



        
        $('button[name=botonEditar]').click(function(e) {

            //UTILIZANDO LOS VALORES DESDE EL SERVIDOR RELLENAMOS EL MODAL, SABIENDO EL INDICE DE LA FILA SABEMO LA POSICION EN TODASAVERIAS
            idProductoFila = $(this).parents("tr").attr('id');

            //console.log(idProductoFila);
            TodasProductos = <?php echo $TodasProductos; ?>;
            elProducto = [];
             //alert(TodasProductos[1]["id"])
            for (i = 0; i < TodasProductos.length; i++) {
            
                if (TodasProductos[i]["id"] == idProductoFila) {
                    elProducto = TodasProductos[i]
                }
            }
            //console.log(elProducto)
            $("#idProductoHidden").val(elProducto["id"])
            prueba = $("#idProductoHidden").val()
            //console.log(prueba)
            $("#precioModificar").val(elProducto["precio"])
            $("#nombreModificar").val(elProducto["nombre"])


        });



        $('button[name=botonBorrar').click(function(e) {

            id = $(this).parents("tr").attr('id')
            console.log(id)
            fila = $(this).parents("tr")
            console.log(fila)
            Swal.fire({
                    title: "Deseas Eliminar el Producto ",
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
                            url: "ProductosEliminar/" + id,
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
                                    title: 'Eliminado con Exito',
                                    showConfirmButton: false,
                                    timer: 1500
                                })

                            }
                        });

                    } else {
                        // Dijeron que no
                        jQuery.noConflict();
                        $('#modalModificar').modal('hide');
                    }
                });



        });


        $("#botonModificarModal").click(function(e) {
            e.preventDefault();
            //console.log('el id del producto a modicar es ' +$("#idProductoHidden").val())
            fila = $("#"+$("#idProductoHidden").val())
            //console.log(fila.html()) //+1 porque cuenta la cabecera de la tabla como fila
            //console.log(fila.find("td:eq(1)").html())

            IdProducto = $("#idProductoHidden").val()
            nombre = $("#nombreModificar").val()
            precio = $("#precioModificar").val()
            console.log(precio)
            console.log(nombre)

            var token = '{{ csrf_token() }}'

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ModificarProducto",
                type: "GET",
                data: {
                    id: IdProducto,
                    precio: precio,
                    nombre: nombre,


                },
                dataType: "html",
                success: function(elemento) {
                    // console.log(vehiculo_id)
                    console.log($("#selectMecanico option:selected").text())
                    fila.find("td:eq(0)").html(nombre)
                    fila.find("td:eq(1)").html(precio)
                    nombre = $("#nombreModificar").val("")
                    precio = $("#precioModificar").val("")

                    jQuery.noConflict();
                    $('#modalModificar').modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Modificado con exito',
                        showConfirmButton: false,
                        timer: 1500
                    })


                }
            });
        });
    </script>
@endsection
