<?php

namespace App\Services\UseCases\Pedido\BuscarPedidoPorId;

use App\Services\UseCases\Pedido\PedidoHandler;

/**
 * Class BuscarPedidoPorIdHandler
 * @package App\Services\UseCases\Pedido\BuscarPedidoPorId
 */
class BuscarPedidoPorIdHandler extends PedidoHandler
{

    public function execute(BuscarPedidoPorIdCommand $command)
    {
        $id = $command->getId();

        return $this->pedidoRepository->bucarPorId($id);
    }

}
