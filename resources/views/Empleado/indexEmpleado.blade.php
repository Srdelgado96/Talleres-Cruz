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
        
            <button type="button" class="btn btn-success btn-rounded btn-fw" style="background-color: #3198FD;">Nueva Empleado</button>
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
                    <tr id="{{$empleado->id}}" class="informacion">
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->rol->permiso}}</td>
                       <td>
                            <div class="d-flex align-items-center" >
                                <a href="{{ route('Empleados.edit', $empleado->id) }}">
                                <button type="button" class="btn btn-warning btn-rounded btn-sm btn-icon-text mr-3">
                                  
                                    
                                    <i class="fa-regular fa-pen-to-square" style=" font-size: 1.7rem !important;"></i>
                                </button></a>
                                
                                <form action="{{ route('Empleados.destroy', $empleado->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-rounded btn-sm btn-icon-text mr-3"><i class="fa-solid fa-trash" style=" font-size: 1.5rem !important;"></i></button>
                                    
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
