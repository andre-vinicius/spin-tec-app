<?php

namespace App\Services\UseCases\Pedido\CadastrarPedido;

use App\Models\Pedido;
use App\Services\UseCases\Cliente\BuscarClientePeloId\BuscarClientePeloIdCommand;
use App\Services\UseCases\Cliente\BuscarClientePeloId\BuscarClientePeloIdHandler;
use App\Services\UseCases\Pedido\PedidoHandler;
use App\Services\UseCases\Produto\BuscarProdutoPorId\BuscarProdutoPorIdCommand;
use App\Services\UseCases\Produto\BuscarProdutoPorId\BuscarProdutoPorIdHandler;

/**
 * Class CadastrarPedidoHandler
 * @package App\Services\UseCases\Pedido\CadastrarPedido
 */
class CadastrarPedidoHandler extends PedidoHandler
{

    public function execute(CadastrarPedidoCommand $command)
    {
        $idCliente = $command->getIdCliente();
        $idProduto = $command->getIdProduto();
        $quantidade = $command->getQuantidade();

        $cliente = (new BuscarClientePeloIdHandler())->execute(new BuscarClientePeloIdCommand($idCliente));
        $produto = (new BuscarProdutoPorIdHandler())->execute(new BuscarProdutoPorIdCommand($idProduto));
    }

}
