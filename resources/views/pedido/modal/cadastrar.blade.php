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
                        <label for="nomeCadastrar">Nome</label>
                        <input type="text" class="form-control" id="nome-cadastrar" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cpfCadastrar">CPF</label>
                        <input type="text" class="form-control" id="cpf-cadastrar" name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="emailCadastrar">E-mail</label>
                        <input type="email" class="form-control" id="email-cadastrar" name="email" required>
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
