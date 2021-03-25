<?php

namespace App\Repositories;

use App\Models\Pedido;

/**
 * Class PedidoRepository
 * @package App\Repositories
 */
class PedidoRepository
{

    /**
     * @param Pedido $pedido
     * @return bool
     */
    public function cadastrar(Pedido $pedido)
    {
        return $pedido->save();
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

}
