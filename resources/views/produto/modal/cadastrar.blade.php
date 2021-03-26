<!-- Cadastrar Produto -->
<div id="cadastrar-produto" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-cadastrar" onSubmit="cadastrarProduto();return false;">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastrar Produto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token-cadastrar" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="nome-cadastrar">Nome</label>
                        <input type="text" class="form-control" id="nome-cadastrar" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="valor-cadastrar">Valor Unitário</label>
                        <input type="text" class="form-control" id="valor-cadastrar" name="valor-unitario" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo-cadastrar">Código Barras</label>
                        <input type="text" class="form-control" id="codigo-cadastrar" name="codigo-barras" required>
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
