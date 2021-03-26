@extends('common.conteudo')
@section('conteudo')
    <script>
        listarClientes();

        function listarClientes() {
            $.get('/api/cliente', function (data) {
                var clientes = data.dados;
                var trHTML = '';

                $('#clientes-tbody').empty();

                $.each(clientes, function (i, cliente) {
                    trHTML += '<tr>';
                    trHTML += '     <td>' + cliente.nome + '</td>';
                    trHTML += '     <td>' + cliente.cpf + '</td>';
                    trHTML += '     <td>' + cliente.email + '</td>';
                    trHTML += '     <td>';
                    trHTML += '         <a href="#" cliente-id="' + cliente.idCliente + '" class="edit btn-editar-cliente"><i class="material-icons" title="Editar Cliente">&#xE254;</i></a>';
                    trHTML += '         <a href="#" cliente-id="' + cliente.idCliente + '" class="delete btn-deletar-cliente"><i class="material-icons" title="Deletar Cliente">&#xE872;</i></a>';
                    trHTML += '     </td>';
                    trHTML += '</tr>';
                });

                $('#clientes-tbody').append(trHTML);
            });
        }

        function cadastrarCliente() {
            var cliente = {
                nome: $('#form-cadastrar #nome-cadastrar').val(),
                cpf: $('#form-cadastrar #cpf-cadastrar').val(),
                email: $('#form-cadastrar #email-cadastrar').val(),
            };

            $.post('/api/cliente', cliente).done(function (data) {
                var sucesso = data.sucesso;

                if(sucesso === true) {
                    listarClientes();
                    $('#cadastrar-cliente').modal('hide');
                } else {
                    alert(data.mensagem);
                }
            });
        }

        function editarCliente() {
            var id = $('#form-editar #id-editar').val();
            var cliente = {
                nome: $('#form-editar #nome-editar').val(),
                cpf: $('#form-editar #cpf-editar').val(),
                email: $('#form-editar #email-editar').val(),
                _method: $('#form-editar #_method-editar').val(),
                _token: $('#form-editar #_token-editar').val(),
            };

            $.post('/api/cliente/' + id, cliente).done(function (data) {
                var sucesso = data.sucesso;

                if(sucesso === true) {
                    listarClientes();
                    $('#editar-cliente').modal('hide');
                } else {
                    alert(data.mensagem);
                }
            });
        }

        function deletarCliente() {

        }

        $(document).on('click', '.btn-editar-cliente', function (e) {
            e.preventDefault();
            showModalEditarCliente($(this).attr('cliente-id'));
        });

        $(document).on('click', '.btn-deletar-cliente', function (e) {
            e.preventDefault();
            showModalDeletarCliente($(this).attr('cliente-id'));
        });

        function showModalEditarCliente(id) {
            $.get('/api/cliente/' + id, function (data) {
                var cliente = data.dados;

                console.log(cliente);

                $('#form-editar #id-editar').val(cliente.idCliente);
                $('#form-editar #nome-editar').val(cliente.nome);
                $('#form-editar #cpf-editar').val(cliente.cpf);
                $('#form-editar #email-editar').val(cliente.email);
            });

            $('#editar-cliente').modal('show');
        }

        function showModalDeletarCliente(id) {
            $('#deletar-cliente').modal('show');
        }
    </script>
    @include('cliente.tabela')
    @include('cliente.modal.cadastrar')
    @include('cliente.modal.deletar')
    @include('cliente.modal.editar')
@endsection
