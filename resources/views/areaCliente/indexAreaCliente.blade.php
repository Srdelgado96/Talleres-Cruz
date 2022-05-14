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
                    <th>Actual</th>
                    <th>Vehiculo</th>
                    <th class="ml-5">Descripción</th>
                    <th>Fecha de Registro</th>
                    <th>Fecha de Finalizacion</th>
                    <th>Estado</th>


                    <th>Mecánico</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($TodasAverias as $averia)
                    <tr id="{{ $averia->id }}" class="informacion">
                        <td>
                            <div class="d-flex align-items-center">
                                @if ($averia->estado->estado == 'Pendiente')
                                    <button type="button" class="btn btn-info btn-rounded btn-sm btn-icon-text mr-3"
                                        name="botonBorrar" style="margin-left: 17%;"><i class="fa-solid fa-hourglass"
                                            style=" font-size: 1.3rem !important;"></i>
                                    </button>
                                @elseif($averia->estado->estado == 'Proceso')
                                    <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3"
                                        name="botonBorrar" style="margin-left: 17%;"><i class="fa-solid fa-wrench"
                                            style=" font-size: 1.3rem !important;"></i>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success btn-rounded btn-sm btn-icon-text mr-3"
                                        data-toggle="modal" data-target=".bd-example-modal-lg" name=botonEditar
                                        style="margin-left: 16%;">
                                        <i class="fa-solid fa-circle-check" style=" font-size: 1.4rem !important;"></i>
                                    </button>
                                @endif

                            </div>
                        </td>
                        <td>{{ $averia->vehiculo->matricula }}</td>
                        <td>{{ $averia->nombre }}</td>
                        <td>{{ Date('d/m/Y', strtotime($averia->fecha_registro)) }}</td>
                        @if ($averia->fecha_finalizacion != null && $averia->fecha_finalizacion != '')
                            <td>{{ Date('d/m/Y', strtotime($averia->fecha_finalizacion)) }}</td>
                        @else
                            <td>{{ $averia->fecha_finalizacion }}</td>
                        @endif
                        <td>{{ $averia->fecha_finalizacion }}</td>
                        <td>{{ $averia->estado->estado }}</td>


                        <td id="{{ $averia->user_id }}">{{ $averia->user->nombre }}</td>

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
