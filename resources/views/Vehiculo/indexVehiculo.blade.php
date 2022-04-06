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
                    <tr id="{{$vehiculo->id}}" class="informacion">
                        <td>{{ $vehiculo->matricula }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->kilometro }}</td>
                         <td>{{ $vehiculo->cliente_id }}</td>
                        <td>
                            <div class="d-flex align-items-center">


                                <a href="{{ route('Clientes.edit', $vehiculo->id) }}">
                                <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                    Editar
                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                </button></a>
                                {{-- <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                            Borrar
                            <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button> --}}
                                <form action="{{ route('Vehiculos.destroy', $vehiculo->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-icon-text">BORRAR</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            });
           
        });

    </script>
@endsection
