<?php

namespace App\Services\UseCases\Pedido\AtualizarPedido;

use App\Services\UseCases\Cliente\BuscarClientePeloId\BuscarClientePeloIdCommand;
use App\Services\UseCases\Cliente\BuscarClientePeloId\BuscarClientePeloIdHandler;
use App\Services\UseCases\Pedido\PedidoHandler;
use App\Services\UseCases\Produto\BuscarProdutoPorId\BuscarProdutoPorIdCommand;
use App\Services\UseCases\Produto\BuscarProdutoPorId\BuscarProdutoPorIdHandler;

/**
 * Class AtualizarPedidoHandler
 * @package App\Services\UseCases\Pedido\AtualizarPedido
 */
class AtualizarPedidoHandler extends PedidoHandler
{

    public function execute(AtualizarPedidoCommand $command)
    {
        $idCliente = $command->getIdCliente();
        $idProduto = $command->getIdProduto();
        $idStatus = null;
        $quantidade = $command->getQuantidade();

        $cliente = (new BuscarClientePeloIdHandler())->execute(new BuscarClientePeloIdCommand($idCliente));
        $produto = (new BuscarProdutoPorIdHandler())->execute(new BuscarProdutoPorIdCommand($idProduto));

        $this->pedidoRepository->atualizar($idCliente,  $idProduto, $idStatus, $quantidade);
    }

}
