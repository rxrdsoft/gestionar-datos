<div class="modal fade" id="editLista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar lista</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route'=>'lista-blanca.edit.lista','method'=>'POST']) !!}

            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombe de la lista</label>
                    <input type="hidden" name="lista_id" id="lista_id">
                    <input type="text" class="form-control" id="nombre_lista" name="nombre_lista" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->