{{--  <!--- Modal crear------>
<div class="modal" id="CreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Crear Nueva Medida</h5>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
                <input type="hidden" value="{{ url('/') }}" id="url">
                <form id="formcreate-medida" action="{{route('medidas.create')}}" method="POST">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @csrf
                   
                    <div class="mb-3">
                        <label for="nombre_medida" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_medida" name="Nombre">


                    </div>
                    <div class="mb-3">
                        <label for="nombre_corto" class="form-label">Nombre Corto</label>
                        <input type="text" class="form-control" id="nombre_corto" name="Nombre corto"
                            placeholder="Ejemplo: PZ">

                    </div>
                    <div class="modal-footer">
                        <button id="cerrar" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btn_save" disabled>Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>  --}}



  @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

@stop

@section('js')
    <script  src="{{ asset('js/medidas.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

@stop