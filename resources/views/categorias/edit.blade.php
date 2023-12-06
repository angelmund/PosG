<!--- Editar crear------>
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="miModalLabel">Editar Nueva Categoría</h5>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
                <input type="hidden" value="{{ url('/') }}" id="url">
                <form id="formedit-categoria" action="{{route('categorias.update', ['idcategoria' => $categoria->idcategoria])}}" method="POST" entype="multipart/form-data">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre_categoria_edit" class="form-label">Nombre de la Medida</label>
                        <input type="text" class="form-control" id="nombre_categoria_edit" name="nombre_categoria_edit" value="{{$categoria->nombre_categoria}}">
                    </div>
                    <div class="modal-footer">
                        <button id="cerrar" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btn_update">Actualizar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/editcategoria.js')}}"></script>