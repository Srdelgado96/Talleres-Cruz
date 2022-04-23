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
        <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nueva
            Factura</button>
        <table class="table table-striped project-orders-table table-hover" id="tablaClientes"
            style="text-align: center !important;">
            <thead>
                <tr>
                    <th class="ml-5">Codigo</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th>Añadir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TodosProductos as $producto)
                    <tr id="{{ $producto->id }}" class="informacion">
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }} </td>
                        <td>{{ $producto->precio }} </td>
                        <td><input type="number" name="unidades" class="inptu"
                                style="width: 20%;/* background-color: #21bf06; */text-align: center;color: black;font-size: 120%;border-color: #3198FD;border-radius: 30%;"
                                value="0"></td>
                        <td style="text-align: right;">
                            <div class="text-center">
                                <div class="">

                                    <label class="toggle-switch toggle-switch-success">
                                        <input type="checkbox" name="estado_id" value="3">
                                        <span class="toggle-slider round"></span>
                                        <i class="input-helper"></i></label>

                                </div>

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
                "bFilter": true,
                "bPaginate": false,
            });

        });
    </script>
@endsection
