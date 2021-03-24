<?php

namespace App\Services\UseCases\Cliente\ListarCliente;

use App\Services\UseCases\Cliente\ClienteHandler;

/**
 * Class ListarProdutoHandler
 * @package App\Services\UseCases\Cliente\ListarCliente
 */
class ListarClienteHandler extends ClienteHandler
{

    /**
     * @param ListarClienteCommand $command
     * @return \App\Models\Cliente[]|\Illuminate\Database\Eloquent\Collection
     */
    public function execute(ListarClienteCommand $command)
    {
        return $this->clienteRepository->listarTodos();
    }

}
