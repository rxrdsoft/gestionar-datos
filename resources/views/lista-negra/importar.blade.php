<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Subir lista negra</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route'=>'lista-negra.store','method'=>'POST','files'=>'true']) !!}

            <div class="modal-body">
                <div class="form-group">
                    <input type="file" class="form-control" name="import_file" required>
                </div>
                <div class="form-group">
                    <label for="">Selecionar lista</label>
                    <select name="categoria_id" id="" class="form-control" required>
                        <option selected disabled>--- Seleccionar opcion ---</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="saveButton" class="btn btn-primary">Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->