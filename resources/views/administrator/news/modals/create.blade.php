<div class="modal fade" id="modal-create-element">
    <form action="{{ route('news.store') }}" method="post" class="modal-dialog" data-info="reset" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="section_id" value="15">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
            </div>
            <div class="form-group">
                <select name="content_3" class="form-control">
                    <option value="NUEVO PRODUCTO">NUEVO PRODUCTO</option>
                    <option value="EVENTO">EVENTO</option>
                    <option value="CAPACITACIONES">CAPACITACIONES</option>
                </select>
            </div>
            <div class="form-group col-sm-12 d-flex flex-column">
                <label for="">Es destacado ?</label>
                <input type="checkbox" name="content_4" value="1">
            </div>
            <div class="form-group">
                <input type="text" name="content_1" class="form-control" placeholder="Título">
            </div>
            <div class="form-group">
                <textarea name="content_2" class="ckeditor" cols="30" rows="10" placeholder="Descripción"></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
                <small>la imagen debe ser al menos 1300x400</small>
            </div>    
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>