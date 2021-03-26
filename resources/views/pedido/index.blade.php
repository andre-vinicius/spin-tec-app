@extends('common.conteudo')
@section('conteudo')
    <script>
        listarPedidos();

        function listarPedidos() {
            $.get('/api/pedido', function (data) {
                var pedidos = data.dados;
                var trHTML = '';

                $('#pedidos-tbody').empty();

                $.each(pedidos, function (i, pedido) {
                    trHTML += '<tr>';
                    trHTML += '     <td>' + pedido.nome + '</td>';
                    trHTML += '     <td>' + pedido.valorUnitario + '</td>';
                    trHTML += '     <td>' + pedido.codigoBarras + '</td>';
                    trHTML += '     <td>';
                    trHTML += '         <a href="#" pedido-id="' + pedido.idPedido + '" class="edit btn-editar-pedido"><i class="material-icons" title="Editar Pedido">&#xE254;</i></a>';
                    trHTML += '         <a href="#" pedido-id="' + pedido.idPedido + '" class="delete btn-deletar-pedido"><i class="material-icons" title="Deletar Pedido">&#xE872;</i></a>';
                    trHTML += '     </td>';
                    trHTML += '</tr>';
                });

                $('#pedidos-tbody').append(trHTML);
            });
        }

        function cadastrarPedido() {
            var pedido = {
                nome: $('#form-cadastrar #nome-cadastrar').val(),
                valorUnitario: $('#form-cadastrar #valor-cadastrar').val(),
                codigoBarras: $('#form-cadastrar #codigo-cadastrar').val(),
            };

            $.post('/api/pedido', pedido).done(function (data) {
                var sucesso = data.sucesso;

                if(sucesso === true) {
                    listarPedidos();
                    $('#cadastrar-pedido').modal('hide');
                } else {
                    alert(data.mensagem);
                }
            });
        }

        function editarPedido() {
            var id = $('#form-editar #id-editar').val();
            var pedido = {
                nome: $('#form-editar #nome-editar').val(),
                valorUnitario: $('#form-editar #valor-editar').val(),
                codigoBarra: $('#form-editar #codigo-editar').val(),
                _method: $('#form-editar #_method-editar').val(),
                _token: $('#form-editar #_token-editar').val(),
            };

            $.post('/api/pedido/' + id, pedido).done(function (data) {
                var sucesso = data.sucesso;

                if(sucesso === true) {
                    listarPedidos();
                    $('#editar-pedido').modal('hide');
                } else {
                    alert(data.mensagem);
                }
            });
        }

        function deletarPedido() {

        }

        $(document).on('click', '.btn-editar-pedido', function (e) {
            e.preventDefault();
            showModalEditarPedido($(this).attr('pedido-id'));
        });

        $(document).on('click', '.btn-deletar-pedido', function (e) {
            e.preventDefault();
            showModalDeletarPedido($(this).attr('pedido-id'));
        });

        function showModalEditarPedido(id) {
            $.get('/api/pedido/' + id, function (data) {
                var pedido = data.dados;

                console.log(pedido);

                $('#form-editar #id-editar').val(pedido.idPedido);
                $('#form-editar #nome-editar').val(pedido.nome);
                $('#form-editar #valor-editar').val(pedido.valorUnitario);
                $('#form-editar #codigo-editar').val(pedido.codigoBarras);
            });

            $('#editar-pedido').modal('show');
        }

        function showModalDeletarPedido(id) {
            $('#deletar-pedido').modal('show');
        }
    </script>
@include('pedido.tabela')
@include('pedido.modal.cadastrar')
@include('pedido.modal.deletar')
@include('pedido.modal.editar')
@endsection
