@extends('common.conteudo')
@section('conteudo')
    <script>
        listarProdutos();

        function listarProdutos() {
            $.get('/api/produto', function (data) {
                var produtos = data.dados;
                var trHTML = '';

                $('#produtos-tbody').empty();

                $.each(produtos, function (i, produto) {
                    trHTML += '<tr>';
                    trHTML += '     <td>' + produto.nome + '</td>';
                    trHTML += '     <td>' + produto.valorUnitario + '</td>';
                    trHTML += '     <td>' + produto.codigoBarras + '</td>';
                    trHTML += '     <td>';
                    trHTML += '         <a href="#" produto-id="' + produto.idProduto + '" class="edit btn-editar-produto"><i class="material-icons" title="Editar Produto">&#xE254;</i></a>';
                    trHTML += '         <a href="#" produto-id="' + produto.idProduto + '" class="delete btn-deletar-produto"><i class="material-icons" title="Deletar Produto">&#xE872;</i></a>';
                    trHTML += '     </td>';
                    trHTML += '</tr>';
                });

                $('#produtos-tbody').append(trHTML);
            });
        }

        function cadastrarProduto() {
            var produto = {
                nome: $('#form-cadastrar #nome-cadastrar').val(),
                valorUnitario: $('#form-cadastrar #valor-cadastrar').val(),
                codigoBarras: $('#form-cadastrar #codigo-cadastrar').val(),
            };

            $.post('/api/produto', produto).done(function (data) {
                var sucesso = data.sucesso;

                if(sucesso === true) {
                    listarProdutos();
                    $('#cadastrar-produto').modal('hide');
                } else {
                    alert(data.mensagem);
                }
            });
        }

        function editarProduto() {
            var id = $('#form-editar #id-editar').val();
            var produto = {
                nome: $('#form-editar #nome-editar').val(),
                valorUnitario: $('#form-editar #valor-editar').val(),
                codigoBarra: $('#form-editar #codigo-editar').val(),
                _method: $('#form-editar #_method-editar').val(),
                _token: $('#form-editar #_token-editar').val(),
            };

            $.post('/api/produto/' + id, produto).done(function (data) {
                var sucesso = data.sucesso;

                if(sucesso === true) {
                    listarProdutos();
                    $('#editar-produto').modal('hide');
                } else {
                    alert(data.mensagem);
                }
            });
        }

        function deletarProduto() {

        }

        $(document).on('click', '.btn-editar-produto', function (e) {
            e.preventDefault();
            showModalEditarProduto($(this).attr('produto-id'));
        });

        $(document).on('click', '.btn-deletar-produto', function (e) {
            e.preventDefault();
            showModalDeletarProduto($(this).attr('produto-id'));
        });

        function showModalEditarProduto(id) {
            $.get('/api/produto/' + id, function (data) {
                var produto = data.dados;

                console.log(produto);

                $('#form-editar #id-editar').val(produto.idProduto);
                $('#form-editar #nome-editar').val(produto.nome);
                $('#form-editar #valor-editar').val(produto.valorUnitario);
                $('#form-editar #codigo-editar').val(produto.codigoBarras);
            });

            $('#editar-produto').modal('show');
        }

        function showModalDeletarProduto(id) {
            $('#deletar-produto').modal('show');
        }
    </script>
@include('produto.tabela')
@include('produto.modal.cadastrar')
@include('produto.modal.deletar')
@include('produto.modal.editar')
@endsection
