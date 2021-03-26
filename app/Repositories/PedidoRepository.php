<?php

namespace App\Repositories;

use App\Models\Pedido;

/**
 * Class PedidoRepository
 * @package App\Repositories
 */
class PedidoRepository
{


    public function cadastrar(int $idCliente, int $idProduto, $quantidade)
    {

    }

    /**
     * @param Pedido $pedido
     * @return bool
     */
    public function atualizar(Pedido $pedido)
    {
        return $pedido->save();
    }

    /**
     * Listar todos os pedidos
     *
     * @return Pedido[]|\Illuminate\Database\Eloquent\Collection
     */
    public function listarTodos()
    {
        return Pedido::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function bucarPorId(int $id)
    {
        return Pedido::find($id);
    }

}
