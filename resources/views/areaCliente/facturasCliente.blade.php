@extends('layouts.Master')

@section('usuarioRegistrado')
    <p class="mb-0 font-weight-normal float-left dropdown-header">{{ $cliente->nombre }}</p>
@endsection




@section('principal')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ $message }}
        </div>
    @endif

    <div class="table-responsive pt-3">
        <table class="table table-striped project-orders-table table-hover" id="tablaClientes"
            style="text-align: center !important;">
            <thead>
                <tr>
                    <th class="ml-5">Nombre</th>

                    <th>Cliente</th>
                    <th>Vehiculo</th>
                    <th>Fecha</th>
                    <th>Importe Total</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TodasFacturas as $factura)
                    <tr id="{{ $factura->id }}" class="informacion">
                        <td>{{ $factura->concepto }}</td>
                        <td>{{ $factura->cliente->nombre }} </td>
                        <td>{{ $factura->averia->vehiculo->matricula }} </td>
                        <td>{{ Date('d/m/Y', strtotime($factura->averia->fecha_finalizacion)) }}</td>
                        <td>{{ $factura->total }} €</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('FacturasCliente.pdf', $factura->id) }}">
                                    <button type="button" class="btn btn-dark btn-rounded btn-icon mr-3">
                                        <i class="fa-regular fa-file-pdf " style=" font-size: 1.5rem !important;"></i>
                                    </button></a>
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
    </script>
@endsection
