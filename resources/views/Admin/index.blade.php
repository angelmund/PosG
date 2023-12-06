@extends('layouts.Master')

@section('title', 'Dashboard')

@section('css')
    {{----- estilos datatables -----}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    {{----- estilos de botones -----}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">

    {{-- estilos datable internos--}}
    <link rel="stylesheet" href="{{asset('Master/vendor/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('Master/vendor/datatables/dataTables.bootstrap4.css')}}">

@stop



@section('content')
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="usuarios" class="table table-striped">
                    <thead>
                        <tr>

                            <th class="centrar">#</th>
                            <th class="centrar">Nombre</th>
                            <th class="centrar">Correo</th>
                            <th class="centrar">Estatus</th>
                            <th class="centrar">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    <span class="badge rounded-pill badge-success">Activo</span>

                                </td>
                                <td>
                                    <button type="button" data-func="dt-add" class="abrir-modal btn btn-success btn-xs"
                                        data-bs-toggle="modal" data-bs-target="#createModal" data-remote="#">
                                        <i class=' fas fa-plus'></i> Nuevo
                                    </button>
                                    <button type="button" data-func="dt-add" class="btn btn-primary btn-xs dt-add"
                                        data-bs-toggle="modal" data-bs-target="#editModal" {{-- - data-remote="{{ # }}"- --}}>
                                        Editar <i class="fas fa-pencil"></i>
                                    </button>
                                    <button type="button" data-func="dt-add" class="btn btn-danger btn-xs dt-add">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>   
        </div>
    </div>




@stop



@section('js')
    {{--  <script src="{{asset('Master/vendor/datatables/jquery.dataTables.js')}}"></script>  --}}
    

    {{--  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="{{asset('Master/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Master/vendor/datatables/jquery.dataTables.js')}}"></script> 
    <script src="{{asset('Master/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>  --}}
    
    {{--  <script src="{{asset('Master/vendor/datatables/jquery.dataTables.js')}}"></script>  --}}

    {{-- Asegúrate de que las rutas de tus scripts estén correctas --}}
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  --}}

    {{--  <script src="{{asset('Master/vendor/datatables/jquery.dataTables.min.js')}}"></script>  --}}
    {{--  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>  --}}

    {{-- Botones --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>



    
    <script type="text/javascript" charset="utf-8" async defer>
        $(document).ready(function() {
            var dt_users = $('#usuarios')
            var dt = dt_users.DataTable({
                language: {
                    sProcessing: 'Procesando...',
                    sLengthMenu: 'Mostrar _MENU_ registros',
                    sZeroRecords: 'No se encontraron resultados',
                    sEmptyTable: 'Ningún dato disponible en esta tabla',
                    sInfo: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                    sInfoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
                    sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
                    sInfoPostFix: '',
                    sSearch: 'Busca:',
                    sUrl: '',
                    sInfoThousands: ',',
                    sLoadingRecords: 'Cargando...',
                    oPaginate: {
                        sFirst: 'Primero',
                        sLast: 'Último',
                        sNext: 'Siguiente',
                        sPrevious: 'Anterior'
                    },
                    oAria: {
                        sSortAscending: ': Activar para ordenar la columna de manera ascendente',
                        sSortDescending: ': Activar para ordenar la columna de manera descendente'
                    },
                    
                },
                sProcessing: true,
                //dom: '<"card-header border-bottom p-1"<"head-label"<"dt-action-buttons text-end"B>>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                //dom: '<"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                //dom:'Bfrtilp',
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn btn-success',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        titleAttr: 'Exportar a Excel'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-danger',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        titleAttr: 'Exportar a PDF'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-info',
                        text: '<i class="fas fa-print"></i> Imprimir',
                        titleAttr: 'Imprimir'
                    },
                ],
                responsive: true,
                autoWidth: false
            })
        });
    </script>


@stop
