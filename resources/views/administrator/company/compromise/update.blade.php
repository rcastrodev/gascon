<div class="modal fade" id="modal-update-compromise">
    <form action="{{ route('company.content.updateInfo') }}" method="post" id="form-update-compromise" class="modal-dialog" data-asyn="no">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <input type="hidden" name="section_id" value="6">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
            </div>
            <div class="form-group">
                <input type="text" name="content_1" class="form-control" placeholder="Título">
            </div>
            <div class="form-group">
                <textarea name="content_2" id="content_22" class="ckeditor" cols="30" rows="10" placeholder="Descripción"></textarea>
            </div>   
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>