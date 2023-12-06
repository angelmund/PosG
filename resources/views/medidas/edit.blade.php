<!--- Modal editar ---->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <input type="hidden" value="{{ url('/') }}" id="url">
                    <form id="formedit-medida" action="{{route('medidas.create')}}" method="POST">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre_medida" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre_medida" name="nombre">


                        </div>
                        <div class="mb-3">
                            <label for="nombre_corto" class="form-label">Nombre Corto</label>
                            <input type="text" class="form-control" id="nombre_corto" name="nombrecorto"
                                placeholder="Ejemplo: PZ">

                        </div>
                        <div class="modal-footer">
                            <button id="cerrar" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="btn_save">Guardar</button>
                        </div>                        
                    </form>
                </div>

            </div>
        </div>
    </div>