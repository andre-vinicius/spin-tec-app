<!-- Editar Produto -->
<div id="editar-produto" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-editar" onSubmit="editarProduto();return false;">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Produto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" id="_method-editar" value="PUT">
                    <input type="hidden" name="_token" id="_token-editar" value="{{ csrf_token() }}">
                    <input type="hidden" id="id-editar" name="id">

                    <div class="form-group">
                        <label for="nome-editar">Nome</label>
                        <input type="text" class="form-control" id="nome-editar" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="valor-editar">Valor Unitário</label>
                        <input type="text" class="form-control" id="valor-editar" name="valor-unitario" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo-editar">Código de Barras</label>
                        <input type="text" class="form-control" id="codigo-editar" name="codigo-barras" required>
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
