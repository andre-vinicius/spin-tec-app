<?php

namespace App\Services\UseCases\Pedido\ListarPedido;

use App\Services\UseCases\Pedido\PedidoHandler;

/**
 * Class ListarPedidoHandler
 * @package App\Services\UseCases\Pedido\ListarPedido
 */
class ListarPedidoHandler extends PedidoHandler
{

    /**
     * @param ListarPedidoCommand $command
     * @return \App\Models\Pedido[]|\Illuminate\Database\Eloquent\Collection
     */
    public function execute(ListarPedidoCommand $command)
    {
        return $this->pedidoRepository->listarTodos();
    }

}
