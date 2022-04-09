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
           <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nueva Averia</button></a>
        <table class="table table-striped project-orders-table table-hover" id="tablaClientes" style="text-align: center !important;">
            <thead>
                <tr>
                    <th class="ml-5">Nombre</th>
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
                    <tr id="{{$averia->id}}" class="informacion">
                        <td>{{ $averia->nombre }}</td>
                        <td>{{ $averia->fecha_registro }}</td>
                        <td>{{ $averia->fecha_finalizacion }}</td>
                        <td>{{ $averia->estado->estado}}</td>
                        <td>{{ $averia->cliente->nombre }}</td>
                         <td>{{ $averia->vehiculo->matricula }}</td>
                          <td>{{ $averia->user->nombre }}</td>
                       <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('Facturas.edit', $averia->id) }}">
                                <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3">
                                  
                                    
                                    <i class="fa-regular fa-pen-to-square" style=" font-size: 1.3rem !important;"></i>
                                </button></a>
                                
                               
                                <form action="{{ route('Averias.destroy', $averia->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-rounded btn-sm btn-icon-text mr-3"><i class="fa-solid fa-trash" style=" font-size: 1.3rem !important;"></i></button>
                                    
                                </form>
                               
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
            });
           
        });
    </script>
@endsection
