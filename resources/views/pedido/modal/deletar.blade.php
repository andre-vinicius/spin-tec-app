<!-- Deletar Pedido -->
<div id="deletar-pedido" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-deletar" onSubmit="deletarPedido();return false;">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" id="_method-deletar" value="DELETE">
                    <input type="hidden" name="_token" id="_token-deletar" value="{{ csrf_token() }}">
                    <input type="hidden" id="id-deletar" name="id">

                    <p>Você tem certeza que deseja deleta o registro?</p>
                    <p class="text-warning">Essa operação não pode ser desfeita.</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
