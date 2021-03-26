<?php

namespace App\Services\UseCases\Cliente\AtualizarCliente;

use App\Models\Cliente;
use App\Services\UseCases\Cliente\ClienteHandler;

/**
 * Class AtualizarProdutoHandler
 * @package App\Services\UseCases\Cliente\AtualizarCliente
 */
class AtualizarClienteHandler extends ClienteHandler
{

    /**
     * @param AtualizarClienteCommand $command
     */
    public function execute(AtualizarClienteCommand $command)
    {
        $id = $command->getId();
        $nome = $command->getNome();
        $cpf = $command->getCpf();
        $email = $command->getEmail();

        /** @var Cliente $cliente */
        $cliente = $this->clienteRepository->buscaPorId($id);
        $cliente->setNome($nome);
        $cliente->setCpf($cpf);
        $cliente->setEmail($email);

        $this->clienteRepository->atualizar($cliente);
    }

}
