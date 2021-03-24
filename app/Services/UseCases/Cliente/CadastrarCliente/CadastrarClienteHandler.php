<?php

namespace App\Services\UseCases\Cliente\CadastrarCliente;

use App\Models\Cliente;
use App\Services\UseCases\Cliente\ClienteHandler;

/**
 * Class CadastrarProdutoHandler
 * @package App\Services\UseCases\Cliente\CadastrarCliente
 */
class CadastrarClienteHandler extends ClienteHandler
{

    /**
     * @param CadastrarClienteCommand $command
     */
    public function execute(CadastrarClienteCommand $command)
    {
        $nome = $command->getNome();
        $cpf = $command->getCpf();
        $email = $command->getEmail();

        /**
         * Validações
         */

        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setCpf($cpf);
        $cliente->setEmail($email);

        $this->clienteRepository->cadastrar($cliente);
    }

}
