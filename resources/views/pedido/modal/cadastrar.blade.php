<!-- Cadastrar Pedido -->
<div id="cadastrar-pedido" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-cadastrar" onSubmit="cadastrarPedido();return false;">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastrar Pedido</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token-cadastrar" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="cliente-cadastrar">Cliente</label>
                        <select type="text" class="form-control" id="cliente-cadastrar" name="cliente" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="produto-cadastrar">Produto</label>
                        <select type="text" class="form-control" id="produto-cadastrar" name="produto" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantidade-cadastrar">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade-cadastrar" name="quantidade" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</div>
