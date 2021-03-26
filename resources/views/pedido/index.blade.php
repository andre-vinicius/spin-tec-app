@extends('common.conteudo')
@section('conteudo')
    <script>
        listarPedidos();
        listarTodosClientes();
        listarTodosProdutos();


        function listarTodosClientes() {
            $.get('/api/cliente', function (data) {
                var clientes = data.dados;
                var clienteHTML = '';

                $('#cliente-cadastrar').find('option').remove('');
                $('#cliente-editar').find('option').remove('');

                $.each(clientes, function (i, cliente) {
                    clienteHTML += '<option value="' + cliente.idCliente + '">' + cliente.nome + '</option>'
                });

                $('#cliente-cadastrar').append(clienteHTML);
                $('#cliente-editar').append(clienteHTML);
            });
        }

        function listarTodosProdutos() {
            $.get('/api/produto', function (data) {
                var produtos = data.dados;
                var produtoHTML = '';

                $('#produto-cadastrar').find('option').remove('');
                $('#produto-editar').find('option').remove('');

                $.each(produtos, function (i, produto) {
                    produtoHTML += '<option value="' + produto.idProduto + '">' + produto.nome + '</option>'
                });

                $('#produto-cadastrar').append(produtoHTML);
                $('#produto-editar').append(produtoHTML);
            });
        }

        function listarPedidos() {
            $.get('/api/pedido', function (data) {
                var pedidos = data.dados;
                var trHTML = '';

                $('#pedidos-tbody').empty();

                $.each(pedidos, function (i, pedido) {
                    trHTML += '<tr>';
                    trHTML += '     <td>' + pedido.cliente + '</td>';
                    trHTML += '     <td>' + pedido.produto + '</td>';
                    trHTML += '     <td>' + pedido.total + '</td>';
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
                cliente: $('#form-cadastrar #cliente-cadastrar').val(),
                produto: $('#form-cadastrar #produto-cadastrar').val(),
                quantidade: $('#form-cadastrar #quantidade-cadastrar').val(),
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
                cliente: $('#form-editar #cliente-cadastrar').val(),
                produto: $('#form-editar #produto-cadastrar').val(),
                quantidade: $('#form-editar #quantidade-cadastrar').val(),
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
                var pedido = data.dados[0];

                console.log(pedido);

                $('#form-editar #id-editar').val(pedido.idPedido);
                $('#form-editar #cliente-editar').val(pedido.idCliente);
                $('#form-editar #produto-editar').val(pedido.idProduto);
                $('#form-editar #quantidade-editar').val(pedido.quantidade);
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
