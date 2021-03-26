<?php

namespace App\Repositories;

use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

/**
 * Class PedidoRepository
 * @package App\Repositories
 */
class PedidoRepository
{

    /**
     * @param int $idCliente
     * @param int $idProduto
     * @param int $idStatus
     * @param $quantidade
     * @return bool
     * @throws \Exception
     */
    public function cadastrar(int $idCliente, int $idProduto, $idStatus, $quantidade)
    {
        DB::table('Pedido')->insert(
            array(
                'idCliente'     => $idCliente,
                'idStatus'      => $idStatus,
                'dataPedido'    => (new \DateTime())->format('Y-m-d H:i:s')
            )
        );

        $idPedido = DB::getPdo()->lastInsertId();

        DB::table('PedidoItem')->insert(
            array(
                'idPedido'      => $idPedido,
                'idProduto'     => $idProduto,
                'quantidade'    => $quantidade
            )
        );

        return true;
    }

    /**
     * @param int $idCliente
     * @param int $idProduto
     * @param $idStatus
     * @param $quantidade
     * @return bool
     */
    public function atualizar(int $idCliente, int $idProduto, $idStatus, $quantidade)
    {
        return '';
    }

    /**
     * Listar todos os pedidos
     *
     * @return Pedido[]|\Illuminate\Database\Eloquent\Collection
     */
    public function listarTodos()
    {
        return DB::table('Pedido')
            ->join('PedidoItem', 'Pedido.idPedido', '=', 'PedidoItem.idPedido')
            ->join('Produto', 'PedidoItem.idProduto', '=', 'Produto.idProduto')
            ->join('Cliente', 'Cliente.idCliente', '=', 'Pedido.idCliente')
            ->select('Pedido.idPedido',
                'Cliente.nome as cliente',
                'Produto.nome as produto',
                DB::raw('PedidoItem.quantidade * Produto.valorUnitario as total'))
            ->get()->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function bucarPorId(int $id)
    {
        return DB::table('Pedido')
            ->join('PedidoItem', 'Pedido.idPedido', '=', 'PedidoItem.idPedido')
            ->join('Produto', 'PedidoItem.idProduto', '=', 'Produto.idProduto')
            ->join('Cliente', 'Cliente.idCliente', '=', 'Pedido.idCliente')
            ->select('Pedido.idPedido',
                'Cliente.idCliente',
                'Produto.idProduto',
                'PedidoItem.quantidade')
            ->where('Pedido.idPedido', '=', $id)
            ->get();
    }

}
