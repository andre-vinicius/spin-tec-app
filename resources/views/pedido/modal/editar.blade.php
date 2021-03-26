<!-- Editar Pedido -->
<div id="editar-pedido" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-editar" onSubmit="editarPedido();return false;">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Pedido</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" id="_method-editar" value="PUT">
                    <input type="hidden" name="_token" id="_token-editar" value="{{ csrf_token() }}">
                    <input type="hidden" id="id-editar" name="id">

                    <div class="form-group">
                        <label for="cliente-editar">Cliente</label>
                        <select type="text" class="form-control" id="cliente-editar" name="cliente" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="produto-editar">Produto</label>
                        <select type="text" class="form-control" id="produto-editar" name="produto" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantidade-editar">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade-editar" name="quantidade" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Editar">
                </div>
            </form>
        </div>
    </div>
</div>
