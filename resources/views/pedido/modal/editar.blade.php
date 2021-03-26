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
                        <label for="nomeEditar">Nome</label>
                        <input type="text" class="form-control" id="nome-editar" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cpfEditar">CPF</label>
                        <input type="text" class="form-control" id="cpf-editar" name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="emailEditar">E-mail</label>
                        <input type="email" class="form-control" id="email-editar" name="email" required>
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
