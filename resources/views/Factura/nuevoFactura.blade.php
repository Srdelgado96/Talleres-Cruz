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
        <form action="{{ route('Facturas.store') }}" METHOD="POST" class="text-center">
            @csrf
            <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Vehículo</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="selectVehiculo" name="vehiculo_id">
                                <option value="p">Elige un Vehículo</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Avería</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="selectAveria" name="averia_id">
                                <option value="p">Elige una Avería</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-center"></div>
                <div class="col-md-8 text-center">
                    <div class="form-group">
                        <label for="exampleTextarea1">Concepto</label>
                        <textarea class="form-control" id="concepto" name="concepto" rows="1"></textarea>
                    </div>
                </div>
                <div class="col-md-2 text-center"></div>
            </div>
            <table class="table table-striped project-orders-table table-hover" id="tablaClientes"
                style="text-align: center !important;">
                <thead>
                    <tr>
                        <th class="ml-5">Código</th>
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
                            <td><input type="number" name="ArrayUnidades[]" id="unidades" class="input"
                                    style="width: 20%;/* background-color: #21bf06; */text-align: center;color: black;font-size: 120%;border-color: #3198FD;border-radius: 30%;"
                                    value="0"></td>
                            <td style="text-align: right;">
                                <div class="text-center">
                                    <div class="">
                                        <label class="toggle-switch toggle-switch-success">
                                            <input type="checkbox" name="ArrayProductosId[]" value="{{ $producto->id }}">
                                            <span class="toggle-slider round"></span>
                                            <i class="input-helper"></i></label>

                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-rounded btn-fw" value="Crear">
            </div>
        </form>

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

            setTimeout(function() {
                $('.dataTables_filter input').css('border-width', '2px');
                $('.dataTables_filter input').css('border-color', '#3198FD');
                $('.dataTables_filter input').css('border-radius', '30%');
                $('.dataTables_filter label').css('font-weight', 'bold');
            }, 0000);



        }); //fin ready


        //este metodo nos rellena el select de vehiculos en funcion del cliente elegido en el select de cliente
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

                    $("#selectVehiculo").html(elemento);
                }
            });
        });

        //este metodo nos rellena el select de averias en funcion del vehiculo elegido en el select de vehiculo
        $('#selectVehiculo').change(function(e) {
            e.preventDefault();

            id = parseInt($(this).val());


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/listarAveriasNuevaFactura/" + id,
                method: "GET",
                data: {
                    id: id,
                },
                dataType: "html",
                success: function(elemento) {

                    $("#selectAveria").html(elemento);
                }
            });
        });

        $('.input').click(function(e) {
            // console.log("entro en click unidades")
            $(this).css('backgroundColor', '#58FA58');
          fila=$(this).parents("tr")
          fila.find("input[type=checkbox]").prop('checked',true)
          if($(this).val()<=0){
              fila.find("input[type=checkbox]").prop('checked',false)
              $(this).css('backgroundColor', 'white');
          }
            

        });
    </script>
@endsection
