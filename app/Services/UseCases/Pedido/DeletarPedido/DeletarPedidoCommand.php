<?php

namespace App\Services\UseCases\Pedido\DeletarPedido;

/**
 * Class DeletarPedidoCommand
 * @package App\Services\UseCases\Pedido\DeletarPedido
 */
class DeletarPedidoCommand
{

    /**
     * @var int
     */
    private $idPedido;

    /**
     * DeletarPedidoCommand constructor.
     * @param int $idPedido
     */
    public function __construct($idPedido)
    {
        $this->idPedido = $idPedido;
    }

    /**
     * @return int
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

}
