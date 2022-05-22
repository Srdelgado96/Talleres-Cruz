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
        <a href="{{ route('Facturas.create') }}">
            <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nueva
                Factura</button></a>
        <table class="table table-striped project-orders-table table-hover" id="tablaClientes"
            style="text-align: center !important;">
            <thead>
                <tr>
                    <th class="ml-5">Nombre</th>

                    <th>Cliente</th>
                    <th>Vehiculo</th>
                    <th>Fecha</th>
                    <th>Importe Total</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TodasFacturas as $factura)
                    <tr id="{{ $factura->id }}" class="informacion">
                        <td>{{ $factura->concepto }}</td>
                        <td>{{ $factura->cliente->nombre }} </td>
                        <td>{{ $factura->averia->vehiculo->matricula }} </td>

                        @if ($factura->averia->fecha_finalizacion != null && $factura->averia->fecha_finalizacion != '')
                            <td>{{ Date('d/m/Y', strtotime($factura->averia->fecha_finalizacion)) }}</td>
                        @else
                            <td>{{ $factura->averia->fecha_finalizacion }}</td>
                        @endif
                        <td>{{ $factura->total }} €</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if ($factura->pagado == 'NO')
                                    <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3"
                                        data-toggle="modal" data-target=".bd-example-modal-lg" name=botonEditar>
                                        <i class="fa-solid fa-sack-xmark" style=" font-size: 1.3rem !important;"></i>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success btn-rounded btn-sm btn-icon-text mr-3"
                                        data-toggle="modal" data-target=".bd-example-modal-lg" name=botonEditar>
                                        <i class="fa-solid fa-sack-dollar" style=" font-size: 1.3rem !important;"></i>

                                    </button>
                                @endif
                                <a href="{{ route('Facturas.pdf', $factura->id) }}">
                                    <button type="button" class="btn btn-dark btn-rounded btn-icon mr-3">

                                        <i class="fa-regular fa-file-pdf " style=" font-size: 1.5rem !important;"></i>

                                    </button></a>
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
                "order": [
                    [3, "desc"]
                ]
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
                    title: "Deseas Eliminar la Factura",
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
                            url: "eliminarFactura/" + id,
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
                        $(location).attr("href", "{{ route('Facturas.index') }}")
                    }
                });



        });

        $('button[name=botonEditar').click(function(e) {

            idFacturaFila = $(this).parents("tr").attr('id');
            fila = $(this).parents("tr");


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/pagadaFactura/" + idFacturaFila,
                method: "GET",
                data: {
                    id: idFacturaFila,
                },
                dataType: "html",
                success: function(elemento) {

                    // fila.find("td:eq(5)").html(
                    //     "<button type='button' class='btn btn-success btn-rounded btn-sm btn-icon-text mr-3'ata-toggle='modal' data-target='.bd-example-modal-lg' name='botonEditar'> i class='fa-solid fa-sack-dollar' style=' font-size: 1.3rem !important;'></i> </button><button type='button' class='btn btn-danger btn-rounded btn-sm btn-icon-text mr-3'name='botonBorrar'><i class='fa-solid fa-trash'style='font-size: 1.3rem !important;'></i></button>"
                    // )
                    var td = fila.find("td:eq(5)")
                    var boton = td.find("button:first")
                    boton.prop("class", "btn btn-success btn-rounded btn-sm btn-icon-text mr-3")
                    //console.log(boton)
                }
            });

        });
    </script>
@endsection
