<?php

namespace App\Services\UseCases\Cliente\DeletarCliente;

use App\Models\Cliente;
use App\Services\UseCases\Cliente\ClienteHandler;

/**
 * Class DeletarProdutoHandler
 * @package App\Services\UseCases\Cliente\DeletarCliente
 */
class DeletarClienteHandler extends ClienteHandler
{

    /**
     * @param DeletarClienteCommand $command
     */
    public function execute(DeletarClienteCommand $command)
    {
        $id = $command->getId();

        /** @var Cliente $cliente */
        $cliente = $this->clienteRepository->buscaId($id);

        $cliente->setAtivo(false);

        $this->clienteRepository->atualizar($cliente);
    }

}
